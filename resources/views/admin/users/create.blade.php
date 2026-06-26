@extends('layouts.admin.app')

@section('title', 'ایجاد مشتری جدید')

@section('content')
    <form action="" method="POST">

        @csrf

        <div x-data="{ type: 'individual' }" class="max-w-6xl mx-auto space-y-6">

            {{-- اطلاعات کاربری --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">
                    اطلاعات کاربری
                </h2>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    <div class="relative">
                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            نام و نام خانوادگی
                        </label>

                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">
                    </div>

                    <div class="relative">
                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            موبایل
                        </label>

                        <input type="text" name="mobile" value="{{ old('mobile') }}"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">
                    </div>

                    <div class="relative">
                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            ایمیل
                        </label>

                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">
                    </div>

                    <div class="relative">
                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            رمز عبور
                        </label>

                        <input type="password" name="password"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">
                    </div>

                </div>

            </div>

            {{-- اطلاعات مشتری --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">
                    اطلاعات مشتری
                </h2>

                <div class="mb-6">

                    <label class="block mb-3 text-sm font-medium">
                        نوع مشتری
                    </label>

                    <div class="flex gap-2 p-1 bg-slate-100 rounded-xl">

                        <button type="button" @click="type='individual'"
                            :class="type === 'individual'
                                ?
                                'bg-[#EF443B] text-white shadow' :
                                'text-slate-500'"
                            class="flex-1 rounded-lg py-3 font-medium transition">

                            شخص حقیقی

                        </button>

                        <button type="button" @click="type='company'"
                            :class="type === 'company'
                                ?
                                'bg-[#EF443B] text-white shadow' :
                                'text-slate-500'"
                            class="flex-1 rounded-lg py-3 font-medium transition">

                            شخص حقوقی

                        </button>

                    </div>

                    <input type="hidden" name="type" x-model="type">

                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    {{-- کد ملی / شناسه ملی --}}
                    <div class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">

                            <span
                                x-text="type === 'individual'
                                    ? 'کد ملی'
                                    : 'شناسه ملی'">
                            </span>

                        </label>

                        <input type="text" name="national_code"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">

                    </div>

                    {{-- تاریخ تولد / تاریخ ثبت --}}
                    <div class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">

                            <span
                                x-text="type === 'individual'
                                    ? 'تاریخ تولد'
                                    : 'تاریخ ثبت شرکت'">
                            </span>

                        </label>

                        <input type="date" name="birth_date"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">

                    </div>

                    {{-- نام شرکت --}}
                    <div x-show="type === 'company'" x-transition class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            نام شرکت
                        </label>

                        <input type="text" name="company_name"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">

                    </div>

                    {{-- شماره ثبت --}}
                    <div x-show="type === 'company'" x-transition class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            شماره ثبت
                        </label>

                        <input type="text" name="registration_number"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">

                    </div>

                    {{-- کد اقتصادی --}}
                    <div x-show="type === 'company'" x-transition class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            کد اقتصادی
                        </label>

                        <input type="text" name="economic_code"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">

                    </div>

                </div>

            </div>

            {{-- اطلاعات آدرس --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">
                    اطلاعات آدرس
                </h2>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                    <div class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500 z-10">
                            استان
                        </label>

                        <select name="state"
                            class="w-full h-12 px-4 pl-10 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0 appearance-none bg-white">

                            <option value="">
                                انتخاب استان
                            </option>

                            @foreach (['آذربایجان شرقی', 'آذربایجان غربی', 'اردبیل', 'اصفهان', 'البرز', 'ایلام', 'بوشهر', 'تهران', 'چهارمحال و بختیاری', 'خراسان جنوبی', 'خراسان رضوی', 'خراسان شمالی', 'خوزستان', 'زنجان', 'سمنان', 'سیستان و بلوچستان', 'فارس', 'قزوین', 'قم', 'کردستان', 'کرمان', 'کرمانشاه', 'کهگیلویه و بویراحمد', 'گلستان', 'گیلان', 'لرستان', 'مازندران', 'مرکزی', 'هرمزگان', 'همدان', 'یزد'] as $province)
                                <option value="{{ $province }}">
                                    {{ $province }}
                                </option>
                            @endforeach

                        </select>

                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-500 pointer-events-none"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />

                        </svg>

                    </div>



                    <div class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            شهر
                        </label>

                        <input type="text" name="city"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">

                    </div>

                    <div class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            کد پستی
                        </label>

                        <input type="text" name="postal_code"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">

                    </div>

                </div>

                <div class="relative mt-5">

                    <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                        آدرس
                    </label>

                    <textarea name="address" rows="4"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0"></textarea>

                </div>

            </div>

            {{-- دکمه ذخیره --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-4">

                <button type="submit"
                    class="w-full h-12 rounded-xl bg-[#EF443B] hover:bg-[#dd372f] text-white font-bold transition">

                    ذخیره مشتری

                </button>

            </div>

        </div>

    </form>
@endsection
