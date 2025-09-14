@extends('frontend.layouts.app')

@section('content')
    <!-- Hero Section -->
    <main class="py-40 lg:py-44 bg-secondary" role="main">
      <div
        class="container flex flex-col justify-center items-center gap-6 text-center"
      >
        <h1
          class="text-4xl font-bold"
          data-aos="fade-up"
          data-aos-duration="800"
          data-aos-delay="200"
        >
          مدونة اختبارك النفسي <br />اكتشف، تعلّم، تطوّر
        </h1>

        <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
          في هذه المساحة نشاركك مقالات علمية، تحليلات نفسية، ونصائح عملية <br />
          تساعدك على فهم ذاتك وتطوير قدراتك الشخصية والعاطفية.
        </p>
      </div>
    </main>

    <!-- Blog Section -->
    <section class="py-20 bg-white">
      <div class="container">
        <nav
          class="flex gap-x-1 overflow-x-auto scrollbar-hide"
          aria-label="Tabs"
          role="tablist"
          aria-orientation="horizontal"
        >
            <button
                type="button"
                class="hs-tab-active:bg-primary hs-tab-active:text-black hs-tab-active:hover:text-black py-3 px-4 inline-flex items-center gap-x-2 bg-transparent text-sm font-medium text-center text-gray-500 rounded-lg hover:text-secondary focus:outline-hidden focus:text-secondary disabled:opacity-50 disabled:pointer-events-none active whitespace-nowrap"
                id="all-item"
                aria-selected="true"
                data-hs-tab="#all-tab"
                aria-controls="all-tab"
                role="tab"
            >
                الكل
            </button>

            @foreach ($categories as $category)
            <button
                type="button"
                class="hs-tab-active:bg-primary hs-tab-active:text-black hs-tab-active:hover:text-black py-3 px-4 inline-flex items-center gap-x-2 bg-transparent text-sm font-medium text-center text-gray-500 rounded-lg hover:text-secondary focus:outline-hidden focus:text-secondary disabled:opacity-50 disabled:pointer-events-none whitespace-nowrap"
                id="{{ $category->slug }}-item"
                aria-selected="false"
                data-hs-tab="#{{ $category->slug }}-tab"
                aria-controls="{{ $category->slug }}-tab"
                role="tab"
            >
                {{ $category->name }}
            </button>
            @endforeach
        </nav>

        <div class="mt-8">
            <div
                id="all-tab"
                role="tabpanel"
                aria-labelledby="all-item"
                class="hs-tab-panel"
            >
                <div
                class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-2 sm:gap-4 transition-all duration-300"
                >
                @forelse ($posts as $post)
                    <article
                        class="group relative bg-[#F2F2F2] hover:bg-black rounded-lg border border-gray-200 overflow-hidden shadow-sm p-1.5 transition-colors duration-300"
                        data-aos="fade-up"
                        data-aos-duration="800"
                        data-aos-delay="100"
                    >
                        <div class="relative">
                        <img
                            src="{{ asset('storage/' . $post->image) }}"
                            alt="{{ $post->title }}"
                            class="w-full h-40 sm:h-48 object-cover rounded-lg"
                            loading="lazy"
                        />
                        <span
                            class="absolute top-2 start-2 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs text-black transition-all duration-300 shadow border border-gray-200"
                            >{{ $category->name }}</span>
                        </div>
                        <div class="pt-4 px-2">
                        <h3
                            class="line-clamp-2 text-sm sm:text-lg font-bold text-black hover:text-primary transition-all duration-300 group-hover:text-white"
                        >
                            {{ $post->title }}
                        </h3>
                        <p
                            class="mt-2 line-clamp-3 text-xs sm:text-sm text-black group-hover:text-white transition-all duration-300"
                        >
                            {!! \Illuminate\Support\Str::limit(strip_tags($post->content), 55, '...') !!}
                        </p>
                        <div class="mt-4 text-xs text-black group-hover:text-white">
                            {{ $post->created_at->translatedFormat('d F Y') }}
                        </div>
                        </div>
                        <a
                            href="{{ route('frontend.blog.post', $post->id) }}"
                            class="absolute inset-0"
                            aria-label="{{ $post->title }}">
                        </a>
                    </article>
                @empty
                    <p class="col-span-full px-3 py-3 text-center text-gray-500">
                        لا توجد منشورات بعد.
                    </p>
                @endforelse
                </div>

                <button class="btn-primary mx-auto mt-10 block rounded-full">
                تحميل المزيد
                </button>
            </div>

            @foreach ($categories as $category)
            <div
                id="{{ $category->slug }}-tab"
                role="tabpanel"
                aria-labelledby="{{ $category->slug }}-item"
                class="hs-tab-panel hidden"
            >
                <div
                    class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-2 sm:gap-4 transition-all duration-300">
                    @forelse ($category->publishedPosts as $post)
                    <article
                        class="group relative bg-[#F2F2F2] hover:bg-black rounded-lg border border-gray-200 overflow-hidden shadow-sm p-1.5 transition-colors duration-300"
                        data-aos="fade-up"
                        data-aos-duration="800"
                        data-aos-delay="100"
                    >
                        <div class="relative">
                        <img
                            src="{{ asset('storage/' . $post->image) }}"
                            alt="{{ $post->title }}"
                            class="w-full h-40 sm:h-48 object-cover rounded-lg"
                            loading="lazy"
                        />
                        <span
                            class="absolute top-2 start-2 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs text-black transition-all duration-300 shadow border border-gray-200"
                            >{{ $category->name }}</span>
                        </div>
                        <div class="pt-4 px-2">
                        <h3
                            class="line-clamp-2 text-sm sm:text-lg font-bold text-black hover:text-primary transition-all duration-300 group-hover:text-white"
                        >
                            {{ $post->title }}
                        </h3>
                        <p
                            class="mt-2 line-clamp-3 text-xs sm:text-sm text-black group-hover:text-white transition-all duration-300"
                        >
                            {!! \Illuminate\Support\Str::limit(strip_tags($post->content), 55, '...') !!}
                        </p>
                        <div class="mt-4 text-xs text-black group-hover:text-white">
                            {{ $post->created_at->translatedFormat('d F Y') }}
                        </div>
                        </div>
                        <a
                            href="{{ route('frontend.blog.post', $post->id) }}"
                            class="absolute inset-0"
                            aria-label="{{ $post->title }}">
                        </a>
                    </article>
                    @empty
                    <p class="col-span-full px-3 py-3 text-center text-gray-500">
                        لا توجد منشورات بعد.
                    </p>
                    @endforelse
                </div>
                <button class="btn-primary mx-auto mt-10 block rounded-full">
                    تحميل المزيد
                </button>
            </div>
            @endforeach
        </div>
      </div>
    </section>
@endsection
