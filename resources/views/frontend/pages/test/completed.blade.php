@extends('frontend.layouts.app')

@section('content')
<main class="min-h-screen bg-gray-50 py-32">
      <div class="container">
        <!-- Progress Section -->
        <div class="mb-8">
          <h2 class="mb-2">تم إكمال الاختبار بنجاح</h2>
          <div class="w-full bg-gray-200 rounded-full h-2">
            <div class="bg-primary h-2 rounded-full" style="width: 100%"></div>
          </div>
        </div>

        <!-- Question Card -->
        <div>
          <!-- Question Text -->
          <div class="text-center mb-8">
            <h3 class="text-4xl font-bold leading-relaxed">شكرًا لك!</h3>
          </div>

          <!-- Answer Options -->
          <div
            class="mb-8 h-80 flex flex-col items-center justify-center gap-8"
          >
            <img
              src="{{ asset('images/frontend/quiz-completed.webp') }}"
              alt="تم إكمال الاختبار بنجاح"
              class="h-full object-cover"
              loading="eager"
            />

            <p class="text-center text-lg">
              لقد أنهيت جميع الأسئلة بنجاح. اضغط على الزر أدناه لرؤية تحليلك
              المفصل.
            </p>
          </div>

          <!-- Navigation Button -->
          <div class="text-center mt-20">
            <a href="{{ route('dashboard') }}"
              class="btn bg-secondary w-fit text-black px-8 py-3 rounded-lg transition-colors flex items-center mx-auto space-x-2 space-x-reverse"
            >
              <span>عرض النتائج الآن</span
              ><svg
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
            </a>
          </div>
        </div>
      </div>
    </main>
@endsection
