@extends('layouts.admin.app')

@section('title', 'سرویس‌های کاربران')

@section('action')

    <a href="{{ route('admin.user-products.create') }}"
        class="h-11 px-5 flex items-center rounded-xl bg-[#EF443B] text-white font-medium hover:bg-[#dd372f] transition">

        تخصیص سرویس
    </a>

@endsection

@section('content')

    <div class="w-full space-y-6">

        <div class="bg-white border border-slate-200 rounded-2xl overflow-x-auto">

            <table class="w-full min-w-[1100px] text-sm">

                <thead class="bg-slate-50 text-slate-600">
                    <tr class="text-right">
                        <th class="p-4">کاربر</th>
                        <th class="p-4">محصول</th>
                        <th class="p-4">نوع سرویس</th>
                        <th class="p-4">وضعیت</th>
                        <th class="p-4">تعداد</th>
                        <th class="p-4">مصرف</th>
                        <th class="p-4">تاریخ شروع</th>
                        <th class="p-4">انقضاء</th>
                        <th class="p-4 text-left">عملیات</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($userProducts as $item)
                        <tr class="border-t hover:bg-slate-50 transition">

                            <td class="p-4">
                                {{ $item->user?->name }}
                            </td>

                            <td class="p-4 font-medium">
                                {{ $item->product?->name }}
                            </td>

                            <td class="p-4">
                                {{ $item->billing_type }}
                            </td>

                            <td class="p-4">

                                <span
                                    class="px-3 py-1 rounded-lg text-xs

                                    @if ($item->status == 'active') bg-green-100 text-green-700
                                    @elseif($item->status == 'pending') bg-yellow-100 text-yellow-700
                                    @elseif($item->status == 'expired') bg-red-100 text-red-700
                                    @else bg-slate-100 text-slate-700 @endif">

                                    {{ $item->status }}

                                </span>

                            </td>

                            <td class="p-4">
                                {{ $item->quantity }}
                            </td>

                            <td class="p-4">
                                {{ $item->usage_used }}
                                /
                                {{ $item->usage_limit ?: '-' }}
                            </td>

                            <td class="p-4">
                                {{ $item->started_at?->format('Y/m/d') ?: '-' }}
                            </td>

                            <td class="p-4">
                                {{ $item->expires_at?->format('Y/m/d') ?: '-' }}
                            </td>

                            <td class="p-4 flex gap-2 justify-end">

                                <a href="{{ route('admin.user-products.show', $item->id) }}"
                                    class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-xs">

                                    مشاهده

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" class="p-10 text-center text-slate-400">

                                موردی یافت نشد

                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="flex justify-center">
            {{ $userProducts->links() }}
        </div>

    </div>

@endsection
