@extends('frontend.layouts.app')

@section('content')
    <main class="py-40 lg:py-64 bg-secondary" role="main">
      <div class="container flex justify-center items-center text-center">
        <h1
          class="text-4xl font-bold"
          data-aos="fade-up"
          data-aos-duration="800"
          data-aos-delay="200"
        >
          الأسئلة الشائعة
        </h1>
      </div>
    </main>

    <!-- FAQ Section -->
    <section
      class="py-14 sm:py-20 bg-white"
      data-aos="fade-up"
      data-aos-duration="1000"
    >
      <div class="container grid grid-cols-1 lg:grid-cols-[1fr_3fr] gap-8">
        <div
          class="text-center lg:text-start mb-4"
          data-aos="fade-right"
          data-aos-duration="800"
        >
          <h2
            class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 font-ping-bold"
          >
            أسئلة يطرحها مستخدمونا كثيراً
          </h2>
        </div>

        <div
          class="hs-accordion-group space-y-4 w-full"
          data-hs-accordion-always-open=""
        >

            @foreach ($faqs as $faq)
            <div
                class="hs-accordion {{ $loop->first ? 'active' : '' }} hs-accordion-active:bg-primary hs-accordion-active:text-black p-3 sm:p-4 rounded-lg bg-secondary text-black"
                id="heading-{{ $faq->id }}"
                data-aos="fade-up"
                data-aos-duration="600"
                data-aos-delay="{{ 100 + ($loop->index * 100) }}"
            >
                <button
                    class="hs-accordion-toggle py-2 sm:py-3 w-full font-semibold text-start flex justify-between items-center gap-2"
                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                    aria-controls="collapse-{{ $faq->id }}"
                >
                    <span class="text-lg sm:text-xl">{{ $faq->question }}</span>
                    <svg
                        class="hs-accordion-active:hidden block size-5 sm:size-6 flex-shrink-0"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    <svg
                        class="hs-accordion-active:block hidden size-5 sm:size-6 flex-shrink-0"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M5 12h14"></path>
                    </svg>
                </button>
                <div
                    id="collapse-{{ $faq->id }}"
                    class="hs-accordion-content {{ $loop->first ? '' : 'hidden' }} w-full overflow-hidden transition-[height] duration-300"
                    role="region"
                    aria-labelledby="heading-{{ $faq->id }}"
                >
                    <p class="text-sm sm:text-base leading-relaxed">
                        {{ $faq->answer }}
                    </p>
                </div>
            </div>
        @endforeach

        </div>
      </div>
    </section>
@endsection
