@extends('frontend.layouts.app')

@section('content')
    <main class="pt-40 pb-16">
        <div class="container">
        <!-- Article Header -->
        <div class="mb-8">
            <div
            class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6"
            >
            <h1
                class="text-3xl sm:text-4xl lg:text-5xl font-bold text-black mb-4 lg:mb-0"
            >
                {{ $post->title }}
            </h1>
            <div
                class="flex flex-row lg:flex-col justify-start items-center lg:items-start gap-4 lg:gap-2 w-full lg:w-auto"
            >
                <div class="flex items-center gap-2">
                <span class="font-medium">التاريخ:</span>
                <span>{{ $post->created_at->translatedFormat('d F Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                <span class="font-medium">التصنيف:</span>
                <span
                    class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full">
                    {{ $post->category->name }}
                </span>
                </div>
            </div>
            </div>

            <!-- Article Meta -->
            <div
            class="flex flex-col sm:flex-row gap-4 text-sm text-gray-500 mb-8"
            >
            <div class="flex items-center gap-2">
                <span class="font-medium">التاريخ:</span>
                <span>{{ $post->created_at->translatedFormat('d F Y') }}</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="font-medium">التصنيف:</span>
                <span
                    class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full">
                    {{ $post->category->name }}
                </span>
            </div>
            </div>
        </div>

        <!-- Hero Image -->
        <div class="mb-12">
            <img
                src="{{ asset('storage/' . $post->image) }}"
                alt="{{ $post->title }}"
                class="w-full h-64 lg:h-96 object-cover rounded-lg"
                loading="eager"/>
        </div>

        <!-- Article Content -->
        <div class="flex flex-col lg:flex-row items-start gap-8 lg:gap-20">
            <!-- Social Share -->
            <div class="order-2 lg:order-1 mx-auto">
                <h3 class="text-lg font-semibold mb-4 text-center lg:text-right">
                    شارك
                </h3>
                <div class="flex lg:flex-col gap-4 justify-center lg:justify-start">
                    <a
                    href="#"
                    class="w-10 h-10 bg-[#F6F6F6] hover:bg-primary/80 rounded-lg flex items-center justify-center transition-colors"
                    >
                    <svg
                        class="w-5 h-5 text-[#5A5A5A]"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"
                        />
                    </svg>
                    </a>
                    <a
                    href="#"
                    class="w-10 h-10 bg-[#F6F6F6] hover:bg-primary/80 rounded-lg flex items-center justify-center transition-colors"
                    >
                    <svg
                        class="w-5 h-5 text-[#5A5A5A]"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                        />
                    </svg>
                    </a>
                    <a
                    href="#"
                    class="w-10 h-10 bg-[#F6F6F6] hover:bg-primary/80 rounded-lg flex items-center justify-center transition-colors"
                    >
                    <svg
                        class="w-5 h-5 text-[#5A5A5A]"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"
                        />
                    </svg>
                    </a>
                    <a
                    href="#"
                    class="w-10 h-10 bg-[#F6F6F6] hover:bg-primary/80 rounded-lg flex items-center justify-center transition-colors"
                    >
                    <svg
                        class="w-5 h-5 text-[#5A5A5A]"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                        d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"
                        />
                    </svg>
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="order-1 lg:order-2">
            <article class="prose prose-lg max-w-none">
                {!! $post->content !!}
            </article>
            </div>
        </div>
        </div>
    </main>
@endsection
