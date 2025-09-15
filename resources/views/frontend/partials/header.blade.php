@php
    $settings = \App\Models\Setting::first();
@endphp

<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth overflow-x-hidden">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'الرئيسية') | {{ config('app.name', 'مكشوف') }}</title>
    <meta
      name="description"
      content="اكتشف أعماق شخصيتك من خلال اختبار نفسي احترافي مبني على نظريات علمية معتمدة. اختبار سريع ودقيق لتحليل الشخصية في 10 دقائق فقط."
    />

    <link rel="icon" type="image/png" href="{{ $settings->favicon ? asset('storage/' . $settings->favicon) : asset('images/app/favicon.ico') }}">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend/output.css') }}" />

    <!-- AOS CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend/aos.css') }}" />

    @stack('css')

    <!-- Preline UI -->
    <script src="{{ asset('js/frontend/preline.js') }}"></script>
  </head>
  <body class="overflow-x-hidden">
    <!-- Navigation -->
    <header
      class="bg-[#F3F4F8] fixed top-3 left-1/2 -translate-x-1/2 w-[calc(100vw-1.5rem)] lg:w-[calc(100vw-2.5rem)] h-16 z-50 rounded-lg border-b border-gray-200"
      role="banner"
    >
      <nav class="container" role="navigation" aria-label="القائمة الرئيسية">
        <div class="flex justify-between items-center h-16">
          <div class="flex items-center">
            <a href="{{ route('frontend.home') }}" aria-label="الرئيسية - مكشوف">
              <img
                src="{{ $settings->logo ? asset('storage/' . $settings->logo) : asset('images/frontend/nav-logo.webp') }}"
                alt="شعار مكشوف"
                class="h-8"
                loading="eager"
              />
            </a>
          </div>

          <div class="hidden lg:block">
            <ul class="me-10 flex items-baseline space-x-4" role="menubar">
              <li role="none">
                <a
                  href="{{ route('frontend.home') }}"
                  class="font-bold hover:text-primary px-3 py-2 rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                  role="menuitem"
                  aria-current="page"
                  >الرئيسية</a
                >
              </li>
              <li role="none">
                <a
                  href="{{ route('frontend.blog.index') }}"
                  class="font-bold hover:text-primary px-3 py-2 rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                  role="menuitem"
                  >المدونة</a
                >
              </li>
              <li role="none">
                <a
                  href="{{ route('frontend.faq') }}"
                  class="font-bold hover:text-primary px-3 py-2 rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                  role="menuitem"
                  >الأسئلة الشائعة</a
                >
              </li>
              <li role="none">
                <a
                  href="{{ route('frontend.contact.index') }}"
                  class="font-bold hover:text-primary px-3 py-2 rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                  role="menuitem"
                  >تواصل معنا</a
                >
              </li>
            </ul>
          </div>

          <div class="hidden lg:flex items-center gap-x-8">
            @guest
                <a
                href="{{ route('login') }}"
                class="font-bold focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 px-3 py-2 rounded-md transition-colors"
                aria-label="تسجيل الدخول إلى حسابك"
                >
                تسجيل الدخول
                </a>
            @endguest

            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button
                        type="submit"
                        class="font-bold focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 px-3 py-2 rounded-md transition-colors"
                    >
                        تسجيل الخروج
                    </button>
                </form>
            @endauth
            <a
                href="{{ route('frontend.tests.info') }}"
                class="btn-primary rounded-full focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all"
                aria-label="ابدأ الاختبار النفسي الآن"
            >
              ابدأ الاختبار الآن
            </a>
          </div>

          <div class="lg:hidden">
            <button
              type="button"
              class="hs-collapse-toggle bg-white p-2 inline-flex items-center justify-center rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary transition-colors"
              data-hs-collapse="#navbar-collapse-with-animation"
              aria-expanded="false"
              aria-controls="navbar-collapse-with-animation"
              aria-label="فتح قائمة التنقل"
            >
              <span class="sr-only">فتح القائمة</span>
              <svg
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
              </svg>
            </button>
          </div>
        </div>

        <!-- Mobile menu -->
        <div
          class="hs-collapse hidden overflow-hidden transition-[height] duration-300 bg-white w-full lg:hidden z-50"
          id="navbar-collapse-with-animation"
          role="region"
          aria-labelledby="mobile-menu-button"
        >
          <nav
            class="px-2 pt-2 pb-3 space-y-1 sm:px-3 opacity-0 translate-y-2 hs-collapse-open:opacity-100 hs-collapse-open:translate-y-0 transition-[opacity,transform] duration-300"
            role="navigation"
            aria-label="القائمة المتحركة"
          >
            <ul class="space-y-1">
              <li>
                <a
                  href="{{ route('frontend.home') }}"
                  class="text-gray-900 hover:text-primary block px-3 py-2 rounded-md text-base font-ping-medium focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                  aria-current="page"
                  >الرئيسية</a
                >
              </li>
              <li>
                <a
                  href="{{ route('frontend.blog.index') }}"
                  class="text-gray-500 hover:text-primary block px-3 py-2 rounded-md text-base font-medium focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                  >المدونة</a
                >
              </li>
              <li>
                <a
                  href="{{ route('frontend.faq') }}"
                  class="text-gray-500 hover:text-primary block px-3 py-2 rounded-md text-base font-medium focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                  >الأسئلة الشائعة</a
                >
              </li>
              <li>
                <a
                  href="{{ route('frontend.contact.index') }}"
                  class="text-gray-500 hover:text-primary block px-3 py-2 rounded-md text-base font-medium focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                  >تواصل معنا</a
                >
              </li>
            </ul>

            <!-- Mobile buttons -->
            <div class="pt-4 pb-3 border-t border-gray-200">
                <a
                    href="{{ route('login') }}"
                    class="w-full text-center block bg-white font-bold text-black px-3 py-2 rounded-md mb-2 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                    aria-label="تسجيل الدخول إلى حسابك"
                >
                    تسجيل الدخول
                </a>
                <a
                    href="{{ route('frontend.tests.take') }}"
                    class="w-full btn-primary px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                    aria-label="ابدأ الاختبار النفسي الآن"
                >
                    ابدأ الاختبار الآن
                </a>
            </div>
          </nav>
        </div>
      </nav>
    </header>
