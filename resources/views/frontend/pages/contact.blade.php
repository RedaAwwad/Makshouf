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
          تواصل معنا
        </h1>
      </div>
    </main>

    <section class="pt-32 pb-20 bg-white" role="main">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">
          <!-- Left Column - Contact Form -->
          <div
            class="space-y-8"
            data-aos="fade-right"
            data-aos-duration="800"
            data-aos-delay="100"
          >
            <h2
              class="text-3xl lg:text-4xl font-bold text-black"
              data-aos="fade-up"
              data-aos-duration="600"
              data-aos-delay="200"
            >
              هل لديك سؤال أو استفسار؟ <br />نحن هنا لمساعدتك.
            </h2>

            <p
              class="text-lg text-black leading-relaxed"
              data-aos="fade-up"
              data-aos-duration="600"
              data-aos-delay="300"
            >
              نحن نحب الاستماع إليك إذا كان لديك أي استفسار <br />
              حول الاختبار النفسي أو أي ملاحظة عامة.
            </p>

            <div
              class="space-y-6"
              data-aos="fade-up"
              data-aos-duration="600"
              data-aos-delay="400"
            >
              <h3 class="text-xl font-bold text-black">• معلومات التواصل</h3>

              <div class="space-y-4">
                <div
                  class="flex items-center gap-3"
                  data-aos="fade-right"
                  data-aos-duration="500"
                  data-aos-delay="500"
                >
                  <svg
                    class="w-5 h-5 text-secondary"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                    ></path>
                  </svg>
                  <a
                    href="mailto:support@example.com"
                    target="_blank"
                    class="text-black"
                    >support@example.com</a
                  >
                </div>

                <div
                  class="flex items-center gap-3"
                  data-aos="fade-right"
                  data-aos-duration="500"
                  data-aos-delay="600"
                >
                  <svg
                    class="w-5 h-5 text-secondary"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                    ></path>
                  </svg>
                  <a href="tel:+966 XXXXXXXX" target="_blank" class="text-black"
                    >+966 XXXXXXXX</a
                  >
                </div>

                <div
                  class="flex items-center gap-3"
                  data-aos="fade-right"
                  data-aos-duration="500"
                  data-aos-delay="700"
                >
                  <svg
                    class="w-5 h-5 text-secondary"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                    ></path>
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                    ></path>
                  </svg>
                  <a
                    href="https://maps.app.goo.gl/1234567890"
                    class="text-black"
                    target="_blank"
                    >الرياض، المملكة العربية السعودية - حي النرجس</a
                  >
                </div>
              </div>
            </div>
          </div>
          <!-- Right Column - Contact Information -->
          <div
            class="space-y-8"
            data-aos="fade-left"
            data-aos-duration="800"
            data-aos-delay="200"
          >
            <h2
              class="text-3xl lg:text-4xl font-bold text-black"
              data-aos="fade-up"
              data-aos-duration="600"
              data-aos-delay="300"
            >
              نموذج التواصل
            </h2>

            <form
              class="space-y-6"
              data-aos="fade-up"
              data-aos-duration="600"
              data-aos-delay="400"
            >
              <div
                data-aos="fade-up"
                data-aos-duration="500"
                data-aos-delay="500"
              >
                <input
                  type="text"
                  placeholder="الاسم الكامل"
                  class="w-full px-4 py-3 border border-secondary rounded-lg bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-secondary focus:border-secondary transition-all"
                  required
                />
              </div>

              <div
                data-aos="fade-up"
                data-aos-duration="500"
                data-aos-delay="600"
              >
                <input
                  type="email"
                  placeholder="البريد الإلكتروني"
                  class="w-full px-4 py-3 border border-secondary rounded-lg bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-secondary focus:border-secondary transition-all"
                  required
                />
              </div>

              <div
                data-aos="fade-up"
                data-aos-duration="500"
                data-aos-delay="700"
              >
                <input
                  type="text"
                  placeholder="الموضوع"
                  class="w-full px-4 py-3 border border-secondary rounded-lg bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-secondary focus:border-secondary transition-all"
                  required
                />
              </div>

              <div
                data-aos="fade-up"
                data-aos-duration="500"
                data-aos-delay="800"
              >
                <textarea
                  placeholder="رسالتك........."
                  rows="6"
                  class="w-full px-4 py-3 border border-purple-200 rounded-lg bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:border-purple-300 transition-all resize-none"
                  required
                ></textarea>
              </div>

              <button
                type="submit"
                class="bg-primary hover:bg-secondary text-black font-semibold py-3 px-6 rounded-full transition-colors duration-200"
                data-aos="zoom-in"
                data-aos-duration="600"
                data-aos-delay="900"
              >
                إرسال الرسالة
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection
