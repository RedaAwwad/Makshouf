@extends('frontend.layouts.app')

@section('content')
<x-auth-session-status class="mb-4" :status="session('status')" />

<main class="pt-32 lg:pt-40 pb-16">
    <div class="container">
        <div
            class="max-w-md mx-auto"
            data-aos="fade-up"
            data-aos-duration="800"
            data-aos-delay="100"
        >
            <!-- Login Title -->
            <div
            class="text-center mb-8"
            data-aos="fade-down"
            data-aos-duration="600"
            data-aos-delay="200"
            >
            <h1 class="text-3xl font-bold text-gray-800 mb-2">سجل دخول</h1>
            </div>

            <!-- Social Login Buttons -->
            <div
            class="space-y-3 mb-6"
            data-aos="fade-up"
            data-aos-duration="600"
            data-aos-delay="300"
            >
            <a
                href="{{ route('social.redirect', ['provider' => 'facebook']) }}"
                class="w-full bg-white text-gray-700 py-3 px-4 rounded-lg border border-gray-200 hover:bg-gray-50 transition-colors flex items-center justify-center gap-3"
                data-aos="zoom-in"
                data-aos-duration="500"
                data-aos-delay="400"
            >
                Facebook
                <svg
                width="33"
                height="33"
                viewBox="0 0 33 33"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                >
                <g clip-path="url(#clip0_125_137)">
                    <path
                    d="M14.076 31.9003C6.52045 30.567 0.742676 23.9892 0.742676 16.0781C0.742676 7.27813 7.94268 0.078125 16.7427 0.078125C25.5427 0.078125 32.7427 7.27813 32.7427 16.0781C32.7427 23.9892 26.9649 30.567 19.4093 31.9003L18.5205 31.1892H14.9649L14.076 31.9003Z"
                    fill="url(#paint0_linear_125_137)"
                    />
                    <path
                    d="M22.9651 20.5226L23.6762 16.0781H19.4095V12.967C19.4095 11.7226 19.854 10.7448 21.8095 10.7448H23.854V6.65591C22.6984 6.47813 21.454 6.30035 20.2984 6.30035C16.654 6.30035 14.0762 8.52258 14.0762 12.5226V16.0781H10.0762V20.5226H14.0762V31.8115C14.9651 31.9892 15.854 32.0781 16.7428 32.0781C17.6317 32.0781 18.5206 31.9892 19.4095 31.8115V20.5226H22.9651Z"
                    fill="white"
                    />
                </g>
                <defs>
                    <linearGradient
                    id="paint0_linear_125_137"
                    x1="1600.74"
                    y1="3089.32"
                    x2="1600.74"
                    y2="0.078125"
                    gradientUnits="userSpaceOnUse"
                    >
                    <stop stop-color="#0062E0" />
                    <stop offset="1" stop-color="#19AFFF" />
                    </linearGradient>
                    <clipPath id="clip0_125_137">
                    <rect
                        width="32"
                        height="32"
                        fill="white"
                        transform="translate(0.742676 0.078125)"
                    />
                    </clipPath>
                </defs>
                </svg>
            </a>

            <a
                href="{{ route('social.redirect', ['provider' => 'google']) }}"
                class="w-full bg-white text-gray-700 py-3 px-4 rounded-lg border border-gray-200 hover:bg-gray-50 transition-colors flex items-center justify-center gap-3"
                data-aos="zoom-in"
                data-aos-duration="500"
                data-aos-delay="500"
            >
                Google
                <svg
                width="33"
                height="33"
                viewBox="0 0 33 33"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                >
                <g clip-path="url(#clip0_125_122)">
                    <path
                    d="M32.1504 16.3775C32.1504 15.0665 32.0415 14.1098 31.8059 13.1176H16.4844V19.035H25.4777C25.2965 20.5055 24.3174 22.7201 22.1415 24.2082L22.111 24.4063L26.9554 28.0732L27.291 28.106C30.3734 25.3244 32.1504 21.2318 32.1504 16.3775Z"
                    fill="#4285F4"
                    />
                    <path
                    d="M16.4844 31.9682C20.8904 31.9682 24.5893 30.5508 27.291 28.106L22.1415 24.2082C20.7635 25.1472 18.914 25.8027 16.4844 25.8027C12.169 25.8027 8.50637 23.0213 7.20075 19.1768L7.00938 19.1926L1.97212 23.0017L1.90625 23.1807C4.58975 28.3893 10.1019 31.9682 16.4844 31.9682Z"
                    fill="#34A853"
                    />
                    <path
                    d="M7.20065 19.1768C6.85615 18.1846 6.65678 17.1216 6.65678 16.0232C6.65678 14.9247 6.85615 13.8617 7.18253 12.8696L7.1734 12.6583L2.07303 8.78799L1.90615 8.86555C0.800152 11.027 0.165527 13.4543 0.165527 16.0232C0.165527 18.5921 0.800152 21.0192 1.90615 23.1807L7.20065 19.1768Z"
                    fill="#FBBC05"
                    />
                    <path
                    d="M16.4844 6.2435C19.5486 6.2435 21.6156 7.53681 22.7943 8.61761L27.3997 4.22383C24.5712 1.65492 20.8904 0.078125 16.4844 0.078125C10.1019 0.078125 4.58975 3.65687 1.90625 8.86554L7.18263 12.8696C8.50638 9.02506 12.169 6.2435 16.4844 6.2435Z"
                    fill="#EB4335"
                    />
                </g>
                <defs>
                    <clipPath id="clip0_125_122">
                    <rect
                        width="32"
                        height="32"
                        fill="white"
                        transform="translate(0.165527 0.078125)"
                    />
                    </clipPath>
                </defs>
                </svg>
            </a>

            {{-- <button
                class="w-full bg-white text-gray-700 py-3 px-4 rounded-lg border border-gray-200 hover:bg-gray-50 transition-colors flex items-center justify-center gap-3"
                data-aos="zoom-in"
                data-aos-duration="500"
                data-aos-delay="600"
            >
                X
                <svg
                width="33"
                height="33"
                viewBox="0 0 33 33"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path
                    d="M19.1166 13.7772L31.0293 0.234375H28.2064L17.8626 11.9934L9.60101 0.234375H0.0722656L12.5654 18.0162L0.0722656 32.2179H2.89536L13.8187 19.8L22.5435 32.2179H32.0723L19.1159 13.7772H19.1166ZM15.25 18.1728L13.9842 16.4022L3.91256 2.31278H8.24867L16.3766 13.6834L17.6424 15.454L28.2077 30.2341H23.8716L15.25 18.1735V18.1728Z"
                    fill="black"
                />
                </svg>
            </button> --}}
            </div>

            <!-- Divider -->
            <div
            class="relative mb-6"
            data-aos="fade-in"
            data-aos-duration="600"
            data-aos-delay="700"
            >
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-[#F3F4F8] text-gray-500">أو</span>
            </div>
            </div>

            <!-- Login Form -->
            <form
            class="space-y-4"
            data-aos="fade-up"
            data-aos-duration="600"
            data-aos-delay="800"
            method="POST"
            action="{{ route('login') }}"
            >
                @csrf
                <div
                    data-aos="slide-right"
                    data-aos-duration="500"
                    data-aos-delay="900"
                >
                    <input
                    type="email"
                    name="email" :value="old('email')"
                    placeholder="البريد الإلكتروني"
                    class="w-full bg-white text-gray-900 py-3 px-4 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                    required
                    autofocus
                    />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div
                    data-aos="slide-right"
                    data-aos-duration="500"
                    data-aos-delay="1000"
                >
                    <input
                    type="password"
                    name="password"
                    placeholder="كلمة المرور"
                    class="w-full bg-white text-gray-900 py-3 px-4 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                    required
                    />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                {{-- <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}

                <!-- Forgot Password Link -->
                {{-- @if (Route::has('password.request'))
                <div
                    class="text-start"
                    data-aos="fade-in"
                    data-aos-duration="400"
                    data-aos-delay="1100"
                >
                    <a href="{{ route('password.request') }}" class="text-sm"> نسيت كلمة المرور؟ </a>
                </div>
                @endif --}}

                <!-- Login Button -->
                <button
                    type="submit"
                    class="w-full bg-primary text-black py-3 px-4 rounded-lg hover:bg-secondary transition-colors font-medium"
                    data-aos="zoom-in"
                    data-aos-duration="600"
                    data-aos-delay="1200"
                >
                    سجل دخول
                </button>
            </form>

            <!-- Sign Up Link -->
            <div
            class="text-center mt-6"
            data-aos="fade-up"
            data-aos-duration="600"
            data-aos-delay="1300"
            >
            <p class="text-sm text-gray-600">
                ليس لديك حساب؟
                <a
                href="{{ route('register') }}"
                class="text-primary hover:text-secondary font-medium transition-colors"
                >
                أنشئ حسابك الآن
                </a>
            </p>
            </div>
        </div>
    </div>
</main>
@endsection
