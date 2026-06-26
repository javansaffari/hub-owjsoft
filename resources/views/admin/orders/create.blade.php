@extends('layouts.admin.app')

@section('title', 'تخصیص سرویس')

@section('content')

    <form method="POST" action="{{ route('admin.user-products.store') }}">

        @csrf

        <div class="bg-white border border-slate-200 rounded-2xl p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <label class="block mb-2 text-sm">
                        کاربر
                    </label>

                    <select name="user_id" class="w-full h-12 rounded-xl border border-slate-300 px-4">

                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 text-sm">
                        محصول
                    </label>

                    <select name="product_id" class="w-full h-12 rounded-xl border border-slate-300 px-4">

                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }}
                            </option>
                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 text-sm">
                        نوع سرویس
                    </label>

                    <select name="billing_type" class="w-full h-12 rounded-xl border border-slate-300 px-4">

                        <option value="subscription">
                            اشتراکی
                        </option>

                        <option value="usage">
                            مصرفی
                        </option>

                        <option value="one_time">
                            یکبار خرید
                        </option>

                    </select>

                </div>

                <div>

                    <label class="block mb-2 text-sm">
                        وضعیت
                    </label>

                    <select name="status" class="w-full h-12 rounded-xl border border-slate-300 px-4">

                        <option value="active">فعال</option>
                        <option value="pending">در انتظار</option>
                        <option value="expired">منقضی</option>

                    </select>

                </div>

                <div>

                    <label class="block mb-2 text-sm">
                        تعداد
                    </label>

                    <input type="number" name="quantity" value="1"
                        class="w-full h-12 rounded-xl border border-slate-300 px-4">

                </div>

                <div>

                    <label class="block mb-2 text-sm">
                        قیمت واحد
                    </label>

                    <input type="number" name="unit_price" class="w-full h-12 rounded-xl border border-slate-300 px-4">

                </div>

            </div>

            <div class="flex justify-end mt-6">

                <button class="h-12 px-6 rounded-xl bg-[#EF443B] text-white hover:bg-[#dd372f]">

                    ذخیره

                </button>

            </div>

        </div>

    </form>

@endsection
