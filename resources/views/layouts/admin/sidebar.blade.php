@php
    $link = 'flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-gray-100 transition';
@endphp

<aside class="w-72 bg-white border-l shadow-sm">

    {{-- BRAND --}}
    <div class="p-5 font-bold text-center border-b text-lg">
        سامانه مشتریان نرم افزاری اوج
    </div>

    <nav class="p-3 space-y-2 text-sm">

        {{-- داشبورد --}}
        <a href="/admin/dashboard" class="{{ $link }}">
            🏠 <span>داشبورد</span>
        </a>

        {{-- مشتریان --}}
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-3 py-2 rounded-xl hover:bg-gray-100">

                <span>👥 مشتریان</span>
                <span>⌄</span>
            </button>

            <div x-show="open" class="pr-6 mt-1 space-y-1 text-gray-600">
                <a href="/admin/users" class="block py-1 hover:text-black">لیست مشتریان</a>
                <a href="/admin/users/create" class="block py-1 hover:text-black">ایجاد مشتری</a>
            </div>
        </div>

        {{-- مالی --}}
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-3 py-2 rounded-xl hover:bg-gray-100">

                <span>💰 امور مالی</span>
                <span>⌄</span>
            </button>

            <div x-show="open" class="pr-6 mt-1 space-y-1 text-gray-600">
                <a href="/admin/invoices" class="block py-1 hover:text-black">فاکتورها</a>
                <a href="/admin/payments" class="block py-1 hover:text-black">پرداخت‌ها</a>
                <a href="/admin/wallets" class="block py-1 hover:text-black">کیف پول</a>
            </div>
        </div>

        {{-- پشتیبانی --}}
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-3 py-2 rounded-xl hover:bg-gray-100">

                <span>🎫 پشتیبانی</span>
                <span>⌄</span>
            </button>

            <div x-show="open" class="pr-6 mt-1 space-y-1 text-gray-600">
                <a href="/admin/tickets">تیکت‌ها</a>
                <a href="/admin/departments">دپارتمان‌ها</a>
                <a href="/admin/sla-policies">SLA</a>
            </div>
        </div>

        {{-- محصولات --}}
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-3 py-2 rounded-xl hover:bg-gray-100">

                <span>📦 خدمات</span>
                <span>⌄</span>
            </button>

            <div x-show="open" class="pr-6 mt-1 space-y-1 text-gray-600">
                <a href="/admin/products">لیست خدمات</a>
                <a href="/admin/products/create">ایجاد سرویس</a>
            </div>
        </div>

        {{-- سایر --}}
        <a href="/admin/affiliates" class="{{ $link }}">🤝 همکاری در فروش</a>
        <a href="/admin/reports" class="{{ $link }}">📊 گزارشات</a>
        <a href="/admin/logs" class="{{ $link }}">📜 لاگ‌ها</a>
        <a href="/admin/settings" class="{{ $link }}">⚙️ تنظیمات</a>

    </nav>
</aside>
