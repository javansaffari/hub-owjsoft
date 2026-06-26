@extends('layouts.admin.app')

@section('title', 'جزئیات سرویس')

@section('content')

    <div class="space-y-6">

        <div class="bg-white border border-slate-200 rounded-2xl p-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div>
                    <div class="text-slate-500 text-sm">کاربر</div>
                    <div class="font-semibold">
                        {{ $userProduct->user?->name }}
                    </div>
                </div>

                <div>
                    <div class="text-slate-500 text-sm">محصول</div>
                    <div class="font-semibold">
                        {{ $userProduct->product?->name }}
                    </div>
                </div>

                <div>
                    <div class="text-slate-500 text-sm">وضعیت</div>
                    <div class="font-semibold">
                        {{ $userProduct->status }}
                    </div>
                </div>

                <div>
                    <div class="text-slate-500 text-sm">نوع سرویس</div>
                    <div class="font-semibold">
                        {{ $userProduct->billing_type }}
                    </div>
                </div>

                <div>
                    <div class="text-slate-500 text-sm">قیمت واحد</div>
                    <div class="font-semibold">
                        {{ number_format($userProduct->unit_price) }}
                    </div>
                </div>

                <div>
                    <div class="text-slate-500 text-sm">تعداد</div>
                    <div class="font-semibold">
                        {{ $userProduct->quantity }}
                    </div>
                </div>

                <div>
                    <div class="text-slate-500 text-sm">مصرف</div>
                    <div class="font-semibold">
                        {{ $userProduct->usage_used }}
                        /
                        {{ $userProduct->usage_limit ?: '-' }}
                    </div>
                </div>

                <div>
                    <div class="text-slate-500 text-sm">تاریخ شروع</div>
                    <div class="font-semibold">
                        {{ $userProduct->started_at?->format('Y/m/d H:i') ?: '-' }}
                    </div>
                </div>

                <div>
                    <div class="text-slate-500 text-sm">انقضاء</div>
                    <div class="font-semibold">
                        {{ $userProduct->expires_at?->format('Y/m/d H:i') ?: '-' }}
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
