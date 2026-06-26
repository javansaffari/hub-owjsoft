@extends('layouts.admin.app')

@section('title', 'ایجاد فاکتور')

@section('content')

    <form action="" method="POST">
        @csrf

        <div x-data="invoiceForm()" class="max-w-7xl mx-auto space-y-6">

            {{-- اطلاعات فاکتور --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">اطلاعات فاکتور</h2>

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">

                    <div class="relative">
                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500 z-10">مشتری</label>

                        <select name="user_id"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0 bg-white">

                            <option value="">انتخاب مشتری</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="relative">
                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">شماره فاکتور</label>
                        <input type="text" name="invoice_number"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">
                    </div>

                    <div class="relative">
                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">تاریخ سررسید</label>
                        <input type="date" name="due_date"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">
                    </div>

                    <div class="relative">
                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500 z-10">وضعیت</label>

                        <select name="status"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0 bg-white">

                            <option value="unpaid">پرداخت نشده</option>
                            <option value="paid">پرداخت شده</option>
                            <option value="cancelled">لغو شده</option>

                        </select>
                    </div>

                </div>
            </div>

            {{-- آیتم‌ها --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold">آیتم‌های فاکتور</h2>

                    <button type="button" @click="addItem()" class="h-11 px-5 rounded-xl bg-[#EF443B] text-white">
                        افزودن آیتم
                    </button>
                </div>

                <template x-for="(item,index) in items" :key="index">

                    <div class="border border-slate-200 rounded-2xl p-5 mb-5">

                        <div class="grid grid-cols-1 lg:grid-cols-6 gap-5">

                            <div class="relative">
                                <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500 z-10">
                                    محصول
                                </label>

                                <select :name="'items[' + index + '][product_id]'" x-model="item.product_id"
                                    @change="selectProduct(index)"
                                    class="w-full h-12 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">

                                    <option value="">انتخاب محصول</option>

                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                                            data-type="{{ $product->type }}" data-cycle="{{ $product->billing_cycle }}">

                                            {{ $product->name }}

                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- نوع (فارسی) --}}
                            <div class="relative">
                                <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                                    نوع
                                </label>

                                <input type="text" x-model="item.type_fa" readonly
                                    class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-300">
                            </div>

                            {{-- دوره (فارسی) --}}
                            <div class="relative">
                                <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                                    دوره
                                </label>

                                <input type="text" x-model="item.cycle_fa" readonly
                                    class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-300">
                            </div>

                            <div class="relative">
                                <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                                    تعداد
                                </label>

                                <input type="number" min="1" x-model="item.qty" :name="'items[' + index + '][qty]'"
                                    class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B]">
                            </div>

                            <div class="relative">
                                <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                                    قیمت
                                </label>

                                <input type="number" x-model="item.price" :name="'items[' + index + '][unit_price]'"
                                    class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B]">
                            </div>

                            <div class="relative">
                                <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                                    مبلغ
                                </label>

                                <input type="text" readonly :value="(item.qty * item.price).toLocaleString()"
                                    class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-300">
                            </div>

                        </div>

                        <div class="mt-5">
                            <textarea :name="'items[' + index + '][description]'" rows="1"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-[#EF443B]" placeholder="توضیحات..."></textarea>
                        </div>

                    </div>

                </template>

            </div>

            {{-- خلاصه مالی --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">خلاصه مالی</h2>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    <div class="space-y-5">

                        <div class="relative">
                            <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                                تخفیف
                            </label>

                            <input type="number" x-model="discount"
                                class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B]">
                        </div>

                    </div>

                    <div class="bg-slate-50 rounded-2xl p-5 space-y-2">

                        <div class="flex justify-between">
                            <span>مجموع</span>
                            <span x-text="subtotal.toLocaleString()"></span>
                        </div>

                        <div class="flex justify-between">
                            <span>تخفیف</span>
                            <span x-text="discount.toLocaleString()"></span>
                        </div>

                        <div class="flex justify-between">
                            <span>بعد از تخفیف</span>
                            <span x-text="afterDiscount.toLocaleString()"></span>
                        </div>

                        <div class="flex justify-between">
                            <span>مالیات (۱۰٪)</span>
                            <span x-text="taxAmount.toLocaleString()"></span>
                        </div>

                        <div class="border-t pt-3 flex justify-between font-bold text-lg">
                            <span>قابل پرداخت</span>
                            <span x-text="total.toLocaleString()"></span>
                        </div>

                    </div>

                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-4">

                <button type="submit" class="w-full h-12 rounded-xl bg-[#EF443B] text-white font-bold">
                    ذخیره فاکتور
                </button>

            </div>

        </div>

    </form>

    <script>
        function invoiceForm() {
            return {
                discount: 0,

                items: [{
                    product_id: '',
                    qty: 1,
                    price: 0,
                    type: '',
                    cycle: '',
                    type_fa: '',
                    cycle_fa: ''
                }],

                addItem() {
                    this.items.push({
                        product_id: '',
                        qty: 1,
                        price: 0,
                        type: '',
                        cycle: '',
                        type_fa: '',
                        cycle_fa: ''
                    });
                },

                selectProduct(index) {
                    const selects = document.querySelectorAll('select[name^="items"]');
                    const opt = selects[index].selectedOptions[0];

                    const type = opt.dataset.type || '';
                    const cycle = opt.dataset.cycle || '';

                    this.items[index].price = parseFloat(opt.dataset.price || 0);
                    this.items[index].type = type;
                    this.items[index].cycle = cycle;

                    this.items[index].type_fa =
                        type === 'one_time' ? 'یک‌بار مصرف' :
                        type === 'subscription' ? 'اشتراکی' :
                        type === 'pay_as_you_go' ? 'پرداخت به میزان مصرف' : '';

                    this.items[index].cycle_fa =
                        cycle === 'monthly' ? 'ماهانه' :
                        cycle === 'yearly' ? 'سالانه' :
                        cycle === 'weekly' ? 'هفتگی' : '';
                },

                get subtotal() {
                    return this.items.reduce((s, i) => s + (i.qty * i.price), 0);
                },

                get afterDiscount() {
                    return this.subtotal - Number(this.discount);
                },

                get taxAmount() {
                    return this.afterDiscount * 0.10;
                },

                get total() {
                    return this.afterDiscount + this.taxAmount;
                }
            }
        }
    </script>

@endsection
