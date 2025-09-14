@extends('frontend.layouts.app')

@section('content')
    <main class="pt-44 pb-16">
      <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-2 place-items-center gap-8">
          <div
            data-aos="fade-right"
            data-aos-duration="800"
            data-aos-delay="100"
          >
            <h1
              class="text-4xl font-black mb-8"
              data-aos="fade-up"
              data-aos-duration="600"
              data-aos-delay="200"
            >
                {{ $test->title }}
            </h1>
            <p
              class="mb-8 text-xl"
              data-aos="fade-up"
              data-aos-duration="600"
              data-aos-delay="300"
            >
                {!! $test->instructions !!}
            </p>

            {{-- <h2
              class="text-xl font-bold mb-4"
              data-aos="fade-up"
              data-aos-duration="600"
              data-aos-delay="400"
            >
              معلومات عن الاختبار:
            </h2>

            <ul
              class="mb-8 space-y-2"
              data-aos="fade-up"
              data-aos-duration="600"
              data-aos-delay="500"
            >
              <li
                class="flex items-center gap-2"
                data-aos="slide-up"
                data-aos-duration="500"
                data-aos-delay="600"
              >
                <svg
                  width="24"
                  height="25"
                  viewBox="0 0 24 25"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M20 6.60461L9 17.6046L4 12.6046"
                    stroke="#DEACFF"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
                عدد الأسئلة: 20 إلى 30 سؤالًا
              </li>
              <li
                class="flex items-center gap-2"
                data-aos="slide-up"
                data-aos-duration="500"
                data-aos-delay="700"
              >
                <svg
                  width="24"
                  height="25"
                  viewBox="0 0 24 25"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M20 6.60461L9 17.6046L4 12.6046"
                    stroke="#DEACFF"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
                المدة المتوقعة: 7–10 دقائق
              </li>
              <li
                class="flex items-center gap-2"
                data-aos="slide-up"
                data-aos-duration="500"
                data-aos-delay="800"
              >
                <svg
                  width="24"
                  height="25"
                  viewBox="0 0 24 25"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M20 6.60461L9 17.6046L4 12.6046"
                    stroke="#DEACFF"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
                يمكنك إيقاف الاختبار والعودة لاحقًا
              </li>
            </ul> --}}

            <a
                href="{{ route('frontend.tests.take') }}"
                class="btn-primary inline-block mt-8"
                data-aos="zoom-in"
                data-aos-duration="500"
                data-aos-delay="900"
            >
              ابدأ الاختبار الآن
            </a>
          </div>
          <div
            class="h-96 lg:h-[600px]"
            data-aos="fade-left"
            data-aos-duration="800"
            data-aos-delay="200"
          >
            <img
              src="{{ asset('images/frontend/quiz-hero.webp') }}"
              alt="صورة تمهيدية للاختبار النفسي"
              class="w-full h-full rounded-2xl shadow-2xl object-cover"
              loading="eager"
            />
          </div>
        </div>
      </div>
    </main>
@endsection
