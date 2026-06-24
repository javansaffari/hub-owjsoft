@php
    $link = 'flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-gray-100 transition';
@endphp

<aside class="w-72 bg-white border-l shadow-sm min-h-screen">

    {{-- HEADER --}}
    <div class="p-5 font-bold text-center border-b">
        👤 پنل کاربری
    </div>

    <nav class="p-3 space-y-2 text-sm">

        {{-- داشبورد --}}
        <a href="/dashboard" class="{{ $link }}">
            🏠 داشبورد
        </a>

        {{-- سرویس‌ها --}}
        <div x-data="{ open: true }">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-3 py-2 rounded-xl hover:bg-gray-100">

                <span>📦 سرویس‌ها</span>
                <span>⌄</span>
            </button>

            <div x-show="open" class="pr-6 mt-1 space-y-1 text-gray-600">

                <a href="/services" class="block py-1 hover:text-black">
                    سرویس‌های من
                </a>

                <a href="/services/active" class="block py-1 hover:text-black">
                    فعال‌ها
                </a>

                <a href="/services/expired" class="block py-1 hover:text-black">
                    منقضی شده
                </a>

            </div>
        </div>

        {{-- مالی --}}
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-3 py-2 rounded-xl hover:bg-gray-100">

                <span>💰 مالی</span>
                <span>⌄</span>
            </button>

            <div x-show="open" class="pr-6 mt-1 space-y-1 text-gray-600">

                <a href="/invoices">فاکتورها</a>
                <a href="/payments">پرداخت‌ها</a>
                <a href="/wallet">کیف پول</a>

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

                <a href="/tickets">تیکت‌های من</a>
                <a href="/tickets/create">ثبت تیکت</a>

            </div>
        </div>

        {{-- حساب کاربری --}}
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-3 py-2 rounded-xl hover:bg-gray-100">

                <span>⚙️ حساب کاربری</span>
                <span>⌄</span>
            </button>

            <div x-show="open" class="pr-6 mt-1 space-y-1 text-gray-600">

                <a href="/profile">پروفایل</a>
                <a href="/security">امنیت</a>

            </div>
        </div>

        {{-- دعوت دوستان --}}
        <a href="/affiliate" class="{{ $link }}">
            🤝 کد معرف
        </a>

        {{-- خروج --}}
        <form method="POST" action="/logout">
            @csrf
            <button class="w-full text-right px-3 py-2 rounded-xl hover:bg-red-50 text-red-600">
                خروج
            </button>
        </form>

    </nav>
</aside>
