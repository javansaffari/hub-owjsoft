@extends('layouts.admin.app')

@section('title', 'فاکتورها')

@section('action')

    <a href="{{ route('admin.financial.invoices.create') }}"
        class="h-11 px-5 flex items-center rounded-xl bg-[#EF443B] text-white font-medium hover:bg-[#dd372f] transition">

        + ایجاد فاکتور
    </a>

@endsection

@section('content')

    <div class="w-full space-y-6">

        <div class="bg-white border border-slate-200 rounded-2xl overflow-x-auto">

            <table class="w-full min-w-[900px] text-sm">

                <thead class="bg-slate-50 text-slate-600">
                    <tr class="text-right">
                        <th class="p-4">شماره فاکتور</th>
                        <th class="p-4">مشتری</th>
                        <th class="p-4">مبلغ نهایی</th>
                        <th class="p-4">وضعیت</th>
                        <th class="p-4">تاریخ صدور</th>
                        <th class="p-4">سررسید</th>
                        <th class="p-4 text-left">عملیات</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($invoices as $invoice)
                        <tr class="border-t hover:bg-slate-50 transition">

                            <td class="p-4 font-medium">
                                {{ $invoice->invoice_number }}
                            </td>

                            <td class="p-4">
                                {{ $invoice->user->name ?? '-' }}
                            </td>

                            <td class="p-4 font-semibold">
                                {{ number_format($invoice->total) }} تومان
                            </td>

                            <td class="p-4">

                                @if ($invoice->status === 'paid')
                                    <span class="px-3 py-1 rounded-lg bg-green-100 text-green-700 text-xs">
                                        پرداخت شده
                                    </span>
                                @elseif($invoice->status === 'unpaid')
                                    <span class="px-3 py-1 rounded-lg bg-yellow-100 text-yellow-700 text-xs">
                                        پرداخت نشده
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-lg bg-red-100 text-red-700 text-xs">
                                        لغو شده
                                    </span>
                                @endif

                            </td>

                            <td class="p-4">
                                {{ $invoice->due_date ? \Carbon\Carbon::parse($invoice->due_date)->format('Y/m/d') : '-' }}
                            </td>

                            <td class="p-4">
                                {{ $invoice->created_at->format('Y/m/d') }}
                            </td>

                            <td class="p-4 flex gap-2 justify-end">

                                <a href="{{ route('admin.financial.invoices.show', $invoice->id) }}"
                                    class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-xs">
                                    مشاهده
                                </a>

                                <a href="{{ route('admin.financial.invoices.edit', $invoice->id) }}"
                                    class="px-3 py-1 rounded-lg bg-blue-100 hover:bg-blue-200 text-xs">
                                    ویرایش
                                </a>

                                <form action="{{ route('admin.financial.invoices.destroy', $invoice->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="px-3 py-1 rounded-lg bg-red-100 hover:bg-red-200 text-xs">
                                        حذف
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="p-10 text-center text-slate-400">
                                هیچ فاکتوری ثبت نشده
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="flex justify-center pt-4">
            {{ $invoices->links() }}
        </div>

    </div>

@endsection
