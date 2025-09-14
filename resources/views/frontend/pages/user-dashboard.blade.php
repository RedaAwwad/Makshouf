@extends('frontend.layouts.app')

@section('content')
<main class="mt-[78px] py-10">
    <div class="container">
    <h1 class="text-2xl sm:text-3xl font-bold mb-8">لوحة تحكم المستخدم</h1>
    <div class="grid grid-cols-1 lg:grid-cols-[1fr_3fr] gap-6 lg:gap-8">
        <!-- Sidebar -->
        <aside class="space-y-6">
        <h2 class="text-lg font-semibold mb-4">بيانات الحساب</h2>
        <div
            class="bg-white border rounded-lg p-4 sm:p-6"
            data-aos="fade-left"
        >
            <div class="flex flex-col items-center text-center">
            <div class="size-24 rounded-full overflow-hidden mb-4">
                <img
                src="{{ $user->avatar_url }}"
                alt="{{ $user->name }}"
                class="size-full object-cover"
                loading="eager"
                />
            </div>
            <p class="text-lg font-semibold">{{ $user->name }}</p>
            <p class="text-gray-500 text-sm">{{ $user->email }}</p>
            <p class="text-gray-500 text-sm">{{ $user->mobile }}</p>
            <div class="grid grid-cols-1 gap-3 w-full mt-4">
                {{-- <button class="px-3 py-2 rounded-md bg-primary text-black">
                تغيير كلمة المرور
                </button> --}}
                <a
                    href="{{ route('profile.edit') }}"
                    class="px-3 py-2 rounded-md bg-primary text-black">
                    تحديث البيانات الشخصية
                </a>
            </div>
            </div>
        </div>

        {{-- <div
            class="bg-white border rounded-lg p-4 sm:p-6"
            data-aos="fade-left"
            data-aos-delay="150"
        >
            <dl class="space-y-3">
            <div class="flex items-center justify-between">
                <dt class="text-gray-500">الجنسية</dt>
                <dd class="font-medium">السعودية</dd>
            </div>
            <div class="flex items-center justify-between">
                <dt class="text-gray-500">تاريخ الميلاد</dt>
                <dd class="font-medium">5، 1992</dd>
            </div>
            <div class="flex items-center justify-between">
                <dt class="text-gray-500">الجنس</dt>
                <dd class="font-medium">ذكر</dd>
            </div>
            </dl>
        </div> --}}
        </aside>
        <section class="space-y-6">
        <!-- Previous Tests -->
        <h2 class="text-lg font-semibold">الاختبارات السابقة</h2>
        <div
            class="bg-white border rounded-lg p-4 sm:p-6"
            data-aos="fade-up"
        >
            <div class="overflow-x-auto">
            <table class="min-w-full text-right">
                <thead class="bg-secondary/50 text-gray-700">
                    <tr>
                        <th class="px-3 py-3">الاسم</th>
                        <th class="px-3 py-3">التاريخ</th>
                        <th class="px-3 py-3">الحالة</th>
                        <th class="px-3 py-3">النتيجة</th>
                        <th class="px-3 py-3">إعادة الاختبار</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($results as $result)
                        <tr class="hover:bg-gray-50">
                            <td class="px-3 py-2 font-bold">
                                {{ $result->test->title }}
                            </td>
                            <td class="px-3 py-2">
                                {{ $result->updated_at->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-3 py-2">
                                {{ $result->test->status ?? 'مكتمل' }}
                            </td>
                            <td class="px-3 py-2">
                                @foreach($result->diagnosis as $scaleId => $passed)
                                    <div>
                                        <span class="font-semibold">
                                            {{ \App\Models\PersonalityScale::find($scaleId)?->name }}
                                        </span> :
                                        <span class="{{ $passed ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $passed ? '✓' : '✗' }}
                                        </span>
                                    </div>
                                @endforeach
                            </td>
                            <td class="px-3 py-2">
                                <a href="{{ route('frontend.tests.take', $result->test_id) }}"
                                class="text-primary underline">
                                    إعادة
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-3 py-3 text-center text-gray-500">
                                لا توجد نتائج بعد.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>

        <!-- Last Test Results -->
        {{-- <div class="space-y-4">
            <h2 class="text-lg font-semibold mb-6">نتائج آخر اختبار</h2>
            <div
            class="bg-white border rounded-lg p-4 sm:p-6"
            data-aos="fade-up"
            data-aos-delay="100"
            >
            <div
                class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 items-center"
            >
                <!-- Legend -->
                <div class="space-y-8">
                <h3 class="text-lg font-semibold">
                    اختبار الشخصية المتوازنـة
                </h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center gap-2">
                    <span
                        class="inline-block w-3 h-3 rounded-full bg-[#A2EEA8]"
                    ></span>
                    <span>التفكير التحليلي — 32%</span>
                    </li>
                    <li class="flex items-center gap-2">
                    <span
                        class="inline-block w-3 h-3 rounded-full bg-[#D3F3D5]"
                    ></span>
                    <span>التنفيذ العملي — 23%</span>
                    </li>
                    <li class="flex items-center gap-2">
                    <span
                        class="inline-block w-3 h-3 rounded-full bg-[#FCB1B2]"
                    ></span>
                    <span>التخطيط طويل المدى — 18%</span>
                    </li>
                    <li class="flex items-center gap-2">
                    <span
                        class="inline-block w-3 h-3 rounded-full bg-[#D3D8F3]"
                    ></span>
                    <span>الإبداع والتجديد — 16%</span>
                    </li>
                    <li class="flex items-center gap-2">
                    <span
                        class="inline-block w-3 h-3 rounded-full bg-[#DEACFF]"
                    ></span>
                    <span>التواصل الاجتماعي — 11%</span>
                    </li>
                </ul>
                </div>
                <!-- Donut chart -->
                <div
                class="relative shrink-0 w-40 h-40 lg:w-48 lg:h-48 rounded-full"
                style="
                    background: conic-gradient(
                    #a2eea8 32%,
                    #d3f3d5 32% 55%,
                    #fcb1b2 55% 73%,
                    #d3d8f3 73% 89%,
                    #deacff 89% 100%
                    );
                "
                >
                <div class="absolute inset-5 rounded-full"></div>
                </div>

                <button
                class="btn-primary font-normal rounded-lg w-full h-10"
                >
                باقي التفاصيل
                </button>
            </div>
            </div>
        </div> --}}
        </section>
    </div>
    </div>
</main>
@endsection
