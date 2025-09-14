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
          سياسة الخصوصية والشروط والأحكام
        </h1>
      </div>
    </main>

    <section class="pt-32 pb-20 bg-white" role="main">
      <div class="container">
        <div class="max-w-4xl mx-auto">
          <h1 class="text-4xl font-bold text-center mb-12 text-gray-800">
            سياسة الخصوصية
          </h1>

          <!-- Section 1: Introduction -->
          <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">أولاً: مقدمة</h2>
            <p class="text-gray-700 leading-relaxed">
              نحن ملتزمون بحماية خصوصيتك وبياناتك الشخصية. باستخدامك لهذا الموقع
              أو الخدمات، فإنك توافق على الشروط والسياسات المذكورة أدناه.
            </p>
          </div>

          <!-- Section 2: Data Collection -->
          <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">
              ثانياً: البيانات التي نقوم بجمعها
            </h2>
            <ul
              class="list-disc list-inside text-gray-700 leading-relaxed space-y-2"
            >
              <li>الاسم والبريد الإلكتروني ومعلومات تسجيل الدخول</li>
              <li>إجابات الاختبارات النفسية</li>
              <li>معلومات الدفع (عبر بوابات الدفع الآمنة فقط)</li>
              <li>
                بيانات الاستخدام، مثل الوقت المستغرق في الاختبارات ونوع الجهاز
                والمتصفح
              </li>
            </ul>
          </div>

          <!-- Section 3: How We Use Information -->
          <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">
              ثالثاً: كيف نستخدم معلوماتك
            </h2>
            <ul
              class="list-disc list-inside text-gray-700 leading-relaxed space-y-2"
            >
              <li>تقديم نتائج تحليل شخصية دقيقة</li>
              <li>إرسال التقارير عبر البريد الإلكتروني</li>
              <li>تحسين جودة وأسئلة الاختبارات</li>
              <li>التواصل لدعم فني أو تحديثات</li>
              <li>الامتثال للمتطلبات القانونية والتنظيمية</li>
            </ul>
          </div>

          <!-- Section 4: Protection and Security -->
          <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">
              رابعاً: الحماية والأمان
            </h2>
            <ul
              class="list-disc list-inside text-gray-700 leading-relaxed space-y-2"
            >
              <li>
                يتم تخزين البيانات على خوادم آمنة باستخدام تقنيات التشفير
                الحديثة
              </li>
              <li>
                لا يتم مشاركة البيانات الشخصية مع أي طرف ثالث دون إذن مسبق
              </li>
              <li>لن يتم بيع أو تأجير البيانات لأي كيان تجاري</li>
            </ul>
          </div>

          <!-- Section 5: User Rights -->
          <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">
              خامساً: حقوق المستخدم
            </h2>
            <ul
              class="list-disc list-inside text-gray-700 leading-relaxed space-y-2"
            >
              <li>الحق في طلب نسخة من البيانات الشخصية</li>
              <li>القدرة على طلب تصحيح أو حذف البيانات في أي وقت</li>
              <li>
                خيار إلغاء الحساب تماماً عبر لوحة التحكم أو بالتواصل المباشر
              </li>
            </ul>
          </div>

          <!-- Section 6: Terms of Use -->
          <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">
              سادساً: شروط الاستخدام
            </h2>
            <ul
              class="list-disc list-inside text-gray-700 leading-relaxed space-y-2"
            >
              <li>
                يحظر استخدام الموقع لأي غرض غير قانوني أو لإلحاق الضرر بالآخرين
              </li>
              <li>
                نتائج الاختبارات هي لأغراض إعلامية فقط ولا تعتبر تشخيصاً طبياً
                رسمياً
              </li>
              <li>
                يحتفظ الموقع بالحق في تعديل أو تحديث الأسئلة والمحتوى في أي وقت
              </li>
              <li>
                إخلاء المسؤولية عن أي سوء استخدام أو تفسير شخصي لنتائج
                الاختبارات
              </li>
            </ul>
          </div>

          <!-- Section 7: Payment and Refund Policy -->
          <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">
              سابعاً: سياسة الدفع والاسترداد
            </h2>
            <ul
              class="list-disc list-inside text-gray-700 leading-relaxed space-y-2"
            >
              <li>
                جميع المدفوعات نهائية، ولكن يمكن تقديم طلب استرداد خلال 3 أيام
                من الشراء إذا لم يتم استخدام الخدمة بالكامل
              </li>
              <li>معاملات الدفع تتم عبر بوابات إلكترونية آمنة ومعتمدة</li>
            </ul>
          </div>

          <!-- Section 8: Contact Us -->
          <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">
              ثامناً: التواصل معنا
            </h2>
            <div class="space-y-3">
              <p>
                لأي استفسار بخصوص هذه السياسات أو طلب قانوني، يمكنك التواصل معنا
                عبر:
              </p>
              <div class="flex items-center gap-x-2 text-gray-700">
                <span>📧</span>

                <span
                  >البريد الإلكتروني:
                  <a href="mailto:support@example.com"
                    >support@example.com</a
                  ></span
                >
              </div>
              <div class="flex items-center gap-x-2 text-gray-700">
                <span>📞</span>
                <span
                  >رقم الواتساب:
                  <a href="https://wa.me/966XXXXXXXXXX">+966XXXXXXXXXX</a></span
                >
              </div>
              <div class="flex items-center gap-x-2 text-gray-700">
                <span>📍</span>
                <span>صفحة <a href="contact.html">[تواصل معنا]</a></span>
              </div>
            </div>

            <p class="mt-20">آخر تحديث: يونيو 2025</p>
          </div>
        </div>
      </div>
    </section>
@endsection
