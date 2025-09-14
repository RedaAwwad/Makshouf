@extends('frontend.layouts.app')

@push('css')
<style>
    .question-slide {
    display: none;
    opacity: 0;
    transform: translateX(30px) scale(0.95);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .question-slide.active {
    display: block;
    opacity: 1;
    transform: translateX(0) scale(1);
    }

    .question-slide.fade-out-left {
    opacity: 0;
    transform: translateX(-30px) scale(0.95);
    }

    .question-slide.fade-out-right {
    opacity: 0;
    transform: translateX(30px) scale(0.95);
    }

    .question-slide.fade-in {
    opacity: 1;
    transform: translateX(0) scale(1);
    }

    .question-slide.entering {
    opacity: 0;
    transform: translateX(20px) scale(0.98);
    animation: slideInSmooth 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .question-slide.leaving-left {
    animation: slideOutLeftSmooth 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .question-slide.leaving-right {
    animation: slideOutRightSmooth 0.3s cubic-bezier(0.4, 0, 0.2, 1)
        forwards;
    }

    @keyframes slideInSmooth {
    0% {
        opacity: 0;
        transform: translateX(20px) scale(0.98);
    }
    60% {
        opacity: 0.8;
        transform: translateX(5px) scale(0.99);
    }
    100% {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
    }

    @keyframes slideOutLeftSmooth {
    0% {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
    40% {
        opacity: 0.8;
        transform: translateX(-10px) scale(0.99);
    }
    100% {
        opacity: 0;
        transform: translateX(-30px) scale(0.95);
    }
    }

    @keyframes slideOutRightSmooth {
    0% {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
    40% {
        opacity: 0.8;
        transform: translateX(10px) scale(0.99);
    }
    100% {
        opacity: 0;
        transform: translateX(30px) scale(0.95);
    }
    }

    .progress-section {
    transition: all 0.3s ease-in-out;
    }

    .progress-section.updating {
    opacity: 0.7;
    }
</style>
@endpush

@section('content')
    <main class="min-h-screen bg-gray-50 py-32">
      <div class="container">
        <!-- Progress Section -->
        <div class="progress-section mb-8">
          <h2 id="question-counter" class="mb-2">السؤال 6 من 25</h2>
          <div class="w-full bg-gray-200 rounded-full h-2">
            <div
              id="progress-bar"
              class="bg-primary h-2 rounded-full transition-all duration-300"
            ></div>
          </div>

          <button
            id="prev-button"
            class="flex items-center gap-2 my-10 lg:my-20 disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <svg
              width="34"
              height="16"
              viewBox="0 0 34 16"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M32.7315 8.96663C33.122 8.5761 33.122 7.94294 32.7315 7.55241L26.3676 1.18845C25.977 0.797929 25.3439 0.797929 24.9533 1.18845C24.5628 1.57898 24.5628 2.21214 24.9533 2.60267L30.6102 8.25952L24.9533 13.9164C24.5628 14.3069 24.5628 14.9401 24.9533 15.3306C25.3439 15.7211 25.977 15.7211 26.3676 15.3306L32.7315 8.96663ZM0.0244141 8.25952L0.0244141 9.25952L32.0244 9.25952V8.25952V7.25952L0.0244141 7.25952L0.0244141 8.25952Z"
                fill="black"
              />
            </svg>
            السابق
          </button>
        </div>

        <!-- Question Slides Container -->
        <div id="question-slides" class="relative"></div>

        <!-- Navigation Button -->
        <div class="text-center mt-14">
          <button
            id="next-button"
            class="btn bg-secondary disabled:opacity-50 disabled:cursor-not-allowed text-black px-8 py-3 rounded-lg flex items-center mx-auto space-x-2 space-x-reverse hover:scale-105 transition-all duration-300"
          >
            <span>السؤال التالي</span>
            <svg
              width="18"
              height="16"
              viewBox="0 0 18 16"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M0.317306 7.25212C-0.0732174 7.64265 -0.0732174 8.27581 0.317307 8.66634L6.68127 15.0303C7.07179 15.4208 7.70496 15.4208 8.09548 15.0303C8.48601 14.6398 8.48601 14.0066 8.09548 13.6161L2.43863 7.95923L8.09548 2.30238C8.48601 1.91185 8.48601 1.27869 8.09548 0.888161C7.70496 0.497637 7.07179 0.497637 6.68127 0.888162L0.317306 7.25212ZM17.0244 7.95923L17.0244 6.95923L1.02441 6.95923L1.02441 7.95923L1.02441 8.95923L17.0244 8.95923L17.0244 7.95923Z"
                fill="black"
              />
            </svg>
          </button>
        </div>

        <!-- Save Progress Link -->
        {{-- <div class="text-end mt-10 lg:mt-20">
          <a href="#" class="underline"> احفظ تقدمي وارجع لاحقا </a>
        </div> --}}
      </div>
    </main>
@endsection


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const testId = {{ $test->id }};
    const questions = @json($questions);

    // Quiz state
    let currentQuestionIndex = 0;
    let answers = [];
    let slides = [];

    // DOM elements
    const questionSlides = document.getElementById("question-slides");
    const progressText = document.getElementById("question-counter");
    const progressBar = document.getElementById("progress-bar");
    const prevButton = document.getElementById("prev-button");
    const nextButton = document.getElementById("next-button");

    // Create slides for all questions
    function createSlides() {
        questions.forEach((question, index) => {
        const slideHTML = `
            <div class="question-slide ${
            index === 0 ? "active" : ""
            }" data-slide-index="${index}" data-question-id="${question.id}" data-scale-id="${question.scale}">
            <div class="text-center mb-8">
                <h3 class="text-2xl lg:text-4xl font-bold leading-relaxed">${
                question.text
                }</h3>
            </div>

            <div class="mb-8">
                <div class="flex flex-wrap justify-center items-center gap-4 max-w-xl mx-auto">
                <div class="text-center">
                    <input type="radio" name="answer-${index}" id="agree-${index}" class="sr-only" />
                    <label for="agree-${index}" class="cursor-pointer">
                    <div class="size-12 lg:size-16 bg-[#A2EEA8] border-2 border-[#4BB453] rounded-full mx-auto mb-2 flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <div class="size-6 lg:size-8 bg-black rounded-full radio-dot transition-all duration-300"></div>
                    </div>
                    <span class="text-sm font-bold">نعم</span>
                    </label>
                </div>

                <div class="text-center">
                    <input type="radio" name="answer-${index}" id="disagree-${index}" class="sr-only" />
                    <label for="disagree-${index}" class="cursor-pointer">
                    <div class="w-16 h-16 bg-[#FCB1B2] border-2 border-[#BF4F50] rounded-full mx-auto mb-2 flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <div class="w-8 h-8 bg-black rounded-full radio-dot transition-all duration-300"></div>
                    </div>
                    <span class="text-sm font-bold">لا</span>
                    </label>
                </div>
                </div>
            </div>
            </div>
        `;
        questionSlides.insertAdjacentHTML("beforeend", slideHTML);
        });

        slides = document.querySelectorAll(".question-slide");
        addRadioListeners();
    }

    // Add event listeners to radio buttons
    function addRadioListeners() {
        slides.forEach((slide, slideIndex) => {
        const radios = slide.querySelectorAll(
            `input[name="answer-${slideIndex}"]`
        );
        radios.forEach((radio) => {
            radio.addEventListener("change", function () {
            const scaleId = questions[slideIndex].scale;
            const questionId = questions[slideIndex].id;
            const answerValue = getAnswerValue(this.id);

            // Update or add answer for this question
            const existingAnswerIndex = answers.findIndex(
                (answer) => answer.question_id === questionId
            );
            if (existingAnswerIndex !== -1) {
                answers[existingAnswerIndex].answer_value = answerValue;
            } else {
                answers.push({
                    scale_id: scaleId,
                    question_id: questionId,
                    answer_value: answerValue,
                });
            }

            updateButtons();
            updateRadioSelection(slide, this.id);
            });
        });
        });
    }

    // Convert radio button ID to answer value
    function getAnswerValue(radioId) {
        const answerMap = {
            "agree": "yes",
            "disagree": "no",
        };

        // Extract the answer type from the ID (e.g., "agree-0" -> "agree")
        const answerType = radioId.split("-").slice(0, -1).join("-");
        return answerMap[answerType] || null;
    }

    // Get answer value for a question by ID
    function getAnswerForQuestion(questionId) {
        const answer = answers.find(
            (answer) => answer.question_id === questionId
        );
        return answer ? answer.answer_value : null;
    }

    // Convert answer value back to radio button ID
    function getRadioIdFromAnswerValue(answerValue, questionIndex) {
        const valueMap = {
            "yes": "agree",
            "no": "disagree",
        };

        const answerType = valueMap[answerValue];
        return answerType ? `${answerType}-${questionIndex}` : null;
    }

    // Submit quiz results to backend
    function submitQuizResults() {
        const quizData = {
            test_id: testId,
            answers: answers,
        };

        // Send POST request to your Laravel route
        fetch("{{ route('frontend.tests.submit') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify(quizData),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok " + response.statusText);
            }

            return response.json();
        })
        .then(data => {
            console.log("Quiz submitted successfully:", data);
            // Redirect or show success message
            window.location.href = "{{ route('frontend.tests.completed') }}";
        })
        .catch(error => {
            console.error("Error submitting quiz:", error);
        });
    }

    // Update radio button visual selection
    function updateRadioSelection(slide, selectedId) {
        const labels = slide.querySelectorAll("label");
        labels.forEach((label) => {
        const radioDot = label.querySelector(".radio-dot");
        const radioInput = document.getElementById(
            label.getAttribute("for")
        );

        if (radioInput && radioInput.id === selectedId) {
            radioDot.classList.add("bg-black");
        } else {
            radioDot.classList.remove("bg-black");
        }
        });
    }

    // Initialize quiz
    function initializeQuiz() {
        createSlides();
        updateProgress();
        updateButtons();
        nextButton.disabled = true;

        // Add event listeners
        prevButton.addEventListener("click", goToPreviousQuestion);
        nextButton.addEventListener("click", goToNextQuestion);
    }

    // Update button states
    function updateButtons() {
        // Previous button
        if (currentQuestionIndex === 0) {
            prevButton.disabled = true;
        } else {
            prevButton.disabled = false;
        }

        // Next button - check if current question has an answer
        const currentQuestionId = questions[currentQuestionIndex].id;
        const hasAnswer = getAnswerForQuestion(currentQuestionId) !== null;
        nextButton.disabled = !hasAnswer;

        // Change next button text for last question
        const nextButtonSpan = nextButton.querySelector("span");
        if (nextButtonSpan) {
        if (currentQuestionIndex === questions.length - 1) {
            nextButtonSpan.textContent = "إنهاء الاختبار";
        } else {
            nextButtonSpan.textContent = "السؤال التالي";
        }
        }
    }

    // Update progress display
    function updateProgress() {
        progressText.textContent = `السؤال ${currentQuestionIndex + 1} من ${
        questions.length
        }`;
        progressBar.style.width = `${
        ((currentQuestionIndex + 1) / questions.length) * 100
        }%`;
    }

    // Navigate to next question with animation
    function goToNextQuestion() {
        if (currentQuestionIndex < questions.length - 1) {
        // Add smooth leaving animation to current slide
        slides[currentQuestionIndex].classList.add("leaving-left");

        // Add updating class to progress section
        const progressSection = document.querySelector(".progress-section");
        if (progressSection) {
            progressSection.classList.add("updating");
        }

        // Wait for animation to complete, then transition
        setTimeout(() => {
            // Hide current slide
            slides[currentQuestionIndex].classList.remove(
            "active",
            "leaving-left"
            );

            // Move to next question
            currentQuestionIndex++;

            // Show next slide with smooth entering animation
            slides[currentQuestionIndex].classList.add("active", "entering");

            // Update progress
            updateProgress();

            // Update buttons
            updateButtons();

            // Remove updating class from progress
            if (progressSection) {
            progressSection.classList.remove("updating");
            }

            // Remove entering class after animation completes
            setTimeout(() => {
            slides[currentQuestionIndex].classList.remove("entering");
            }, 200);

            // Restore previous answer if exists
            const currentQuestionId = questions[currentQuestionIndex].id;
            const existingAnswer = getAnswerForQuestion(currentQuestionId);
            if (existingAnswer !== null) {
            const currentSlide = slides[currentQuestionIndex];
            const radioId = getRadioIdFromAnswerValue(
                existingAnswer,
                currentQuestionIndex
            );
            const previousRadio = currentSlide.querySelector(`#${radioId}`);
            if (previousRadio) {
                previousRadio.checked = true;
                updateRadioSelection(currentSlide, radioId);
            }
            }
        }, 150); // Wait for leaving animation to complete
        } else {
        // Quiz completed - send data to backend
        submitQuizResults();
        }
    }

    // Navigate to previous question with animation
    function goToPreviousQuestion() {
        if (currentQuestionIndex > 0) {
        // Add smooth leaving animation to current slide
        slides[currentQuestionIndex].classList.add("leaving-right");

        // Add updating class to progress section
        const progressSection = document.querySelector(".progress-section");
        if (progressSection) {
            progressSection.classList.add("updating");
        }

        // Wait for animation to complete, then transition
        setTimeout(() => {
            // Hide current slide
            slides[currentQuestionIndex].classList.remove(
            "active",
            "leaving-right"
            );

            // Move to previous question
            currentQuestionIndex--;

            // Show previous slide with smooth entering animation
            slides[currentQuestionIndex].classList.add("active", "entering");

            // Update progress
            updateProgress();

            // Update buttons
            updateButtons();

            // Remove updating class from progress
            if (progressSection) {
            progressSection.classList.remove("updating");
            }

            // Remove entering class after animation completes
            setTimeout(() => {
            slides[currentQuestionIndex].classList.remove("entering");
            }, 400);

            // Restore previous answer if exists
            const currentQuestionId = questions[currentQuestionIndex].id;
            const existingAnswer = getAnswerForQuestion(currentQuestionId);
            if (existingAnswer !== null) {
            const currentSlide = slides[currentQuestionIndex];
            const radioId = getRadioIdFromAnswerValue(
                existingAnswer,
                currentQuestionIndex
            );
            const previousRadio = currentSlide.querySelector(`#${radioId}`);
            if (previousRadio) {
                previousRadio.checked = true;
                updateRadioSelection(currentSlide, radioId);
            }
            }
        }, 300); // Wait for leaving animation to complete
        }
    }

    // Start the quiz
    initializeQuiz();
});
</script>
@endpush
