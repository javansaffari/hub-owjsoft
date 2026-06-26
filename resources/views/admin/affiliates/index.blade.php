@extends('layouts.admin.app')

@section('title', 'افیلیت‌ها')

@section('action')
    <a href="#" class="h-11 px-5 flex items-center rounded-xl bg-[#EF443B] text-white">
        + ایجاد افیلیت
    </a>
@endsection

@section('content')

    <div class="w-full space-y-6">

        <div class="bg-white border rounded-2xl overflow-x-auto">

            <table class="w-full min-w-[900px] text-sm">

                <thead class="bg-slate-50">
                    <tr class="text-right">
                        <th class="p-4">کاربر</th>
                        <th class="p-4">کد ریفرال</th>
                        <th class="p-4">درصد کمیسیون</th>
                        <th class="p-4">وضعیت</th>
                        <th class="p-4 text-left">عملیات</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($affiliates as $a)
                        <tr class="border-t hover:bg-slate-50">

                            <td class="p-4 font-medium">
                                {{ $a->user->name ?? '-' }}
                            </td>

                            <td class="p-4">
                                <span class="px-3 py-1 bg-slate-100 rounded-lg text-xs">
                                    {{ $a->referral_code }}
                                </span>
                            </td>

                            <td class="p-4">
                                {{ $a->commission_percent }}%
                            </td>

                            <td class="p-4">
                                @if ($a->is_active)
                                    <span class="text-green-600 text-xs">فعال</span>
                                @else
                                    <span class="text-red-600 text-xs">غیرفعال</span>
                                @endif
                            </td>

                            <td class="p-4 flex gap-2 justify-end">

                                <a href="{{ route('admin.affiliates.show', $a->id) }}"
                                    class="px-3 py-1 bg-blue-100 rounded-lg text-xs">
                                    جزئیات
                                </a>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection
