@extends('layouts.admin.app')

@section('title', 'جزئیات افیلیت')

@section('content')

    <div class="w-full space-y-6">

        {{-- پروفایل --}}
        <div class="bg-white border rounded-2xl p-6">

            <div class="text-lg font-bold">
                {{ $affiliate->user->name }}
            </div>

            <div class="text-sm text-slate-500 mt-1">
                کد: {{ $affiliate->referral_code }}
            </div>

            <div class="mt-3 flex gap-3 text-sm">

                <span class="px-3 py-1 bg-slate-100 rounded-lg">
                    درصد: {{ $affiliate->commission_percent }}%
                </span>

                <span
                    class="px-3 py-1 rounded-lg
                {{ $affiliate->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $affiliate->is_active ? 'فعال' : 'غیرفعال' }}
                </span>

            </div>

        </div>

        {{-- کمیسیون‌ها --}}
        <div class="bg-white border rounded-2xl p-6">

            <h2 class="font-bold mb-4">کمیسیون‌ها</h2>

            <table class="w-full text-sm">

                <thead class="bg-slate-50">
                    <tr class="text-right">
                        <th class="p-3">فاکتور</th>
                        <th class="p-3">مبلغ</th>
                        <th class="p-3">درصد</th>
                        <th class="p-3">وضعیت</th>
                        <th class="p-3">تاریخ پرداخت</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($affiliate->commissions as $c)
                        <tr class="border-t">

                            <td class="p-3">#{{ $c->invoice_id }}</td>

                            <td class="p-3">{{ number_format($c->amount) }} تومان</td>

                            <td class="p-3">{{ $c->percent }}%</td>

                            <td class="p-3">
                                @if ($c->status == 'paid')
                                    <span class="text-green-600">پرداخت شده</span>
                                @else
                                    <span class="text-yellow-600">در انتظار</span>
                                @endif
                            </td>

                            <td class="p-3">
                                {{ $c->paid_at ?? '-' }}
                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection
