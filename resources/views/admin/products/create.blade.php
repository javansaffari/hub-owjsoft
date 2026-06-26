@extends('layouts.admin.app')

@section('title', 'ایجاد محصول')

@section('content')
    <form action="" method="POST">

        @csrf

        <div x-data="{ type: 'one_time' }" class="max-w-6xl mx-auto space-y-6">

            {{-- اطلاعات محصول --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">
                    اطلاعات محصول
                </h2>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    <div class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            نام محصول
                        </label>

                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">

                    </div>

                    <div class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            اسلاگ
                        </label>

                        <input type="text" name="slug" value="{{ old('slug') }}" dir="ltr"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">

                    </div>

                </div>

            </div>

            {{-- نوع محصول --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">
                    نوع محصول
                </h2>

                <div class="flex gap-2 p-1 bg-slate-100 rounded-xl">

                    <button type="button" @click="type='one_time'"
                        :class="type === 'one_time'
                            ?
                            'bg-[#EF443B] text-white shadow' :
                            'text-slate-500'"
                        class="flex-1 rounded-lg py-3 font-medium transition">

                        خرید یکباره

                    </button>

                    <button type="button" @click="type='subscription'"
                        :class="type === 'subscription'
                            ?
                            'bg-[#EF443B] text-white shadow' :
                            'text-slate-500'"
                        class="flex-1 rounded-lg py-3 font-medium transition">

                        اشتراکی

                    </button>

                    <button type="button" @click="type='pay_as_you_go'"
                        :class="type === 'pay_as_you_go'
                            ?
                            'bg-[#EF443B] text-white shadow' :
                            'text-slate-500'"
                        class="flex-1 rounded-lg py-3 font-medium transition">

                        مصرفی

                    </button>

                </div>

                <input type="hidden" name="type" x-model="type">

            </div>

            {{-- قیمت گذاری --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">
                    قیمت گذاری
                </h2>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    <div class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            قیمت
                        </label>

                        <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">

                    </div>

                    <div x-show="type === 'subscription'" x-transition class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            دوره صورتحساب
                        </label>

                        <select name="billing_cycle"
                            class="w-full h-12 px-4 pl-10 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0 appearance-none bg-white">

                            <option value="">
                                انتخاب دوره
                            </option>

                            <option value="monthly">
                                ماهانه
                            </option>

                            <option value="quarterly">
                                سه ماهه
                            </option>

                            <option value="semi_annually">
                                شش ماهه
                            </option>

                            <option value="yearly">
                                سالانه
                            </option>

                        </select>

                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-500 pointer-events-none"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />

                        </svg>

                    </div>

                </div>

            </div>

            {{-- توضیحات --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">
                    توضیحات محصول
                </h2>

                <div class="relative">

                    <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                        توضیحات
                    </label>

                    <textarea name="description" rows="6"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">{{ old('description') }}</textarea>

                </div>

            </div>

            {{-- وضعیت --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">
                    وضعیت محصول
                </h2>

                <label class="flex items-center gap-3 cursor-pointer">

                    <input type="checkbox" name="is_active" value="1" checked
                        class="w-5 h-5 rounded border-slate-300 text-[#EF443B] focus:ring-[#EF443B]">

                    <span>
                        محصول فعال باشد
                    </span>

                </label>

            </div>

            {{-- دکمه ذخیره --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-4">

                <button type="submit"
                    class="w-full h-12 rounded-xl bg-[#EF443B] hover:bg-[#dd372f] text-white font-bold transition">

                    ذخیره محصول

                </button>

            </div>

        </div>

    </form>
@endsection
