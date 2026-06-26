@extends('layouts.admin.app')

@section('title', 'سیاست‌های SLA')

@section('action')

    <a href="{{ route('admin.sla.create') }}"
        class="h-11 px-5 flex items-center rounded-xl bg-[#EF443B] text-white font-medium hover:bg-[#dd372f] transition">
        + ایجاد SLA
    </a>

@endsection

@section('content')

    <div class="w-full">

        <div class="bg-white border border-slate-200 rounded-2xl overflow-x-auto">

            <table class="w-full min-w-[900px] text-sm">

                <thead class="bg-slate-50 text-slate-600">
                    <tr class="text-right">
                        <th class="p-4">نام SLA</th>
                        <th class="p-4">اولویت</th>
                        <th class="p-4">زمان پاسخ</th>
                        <th class="p-4">زمان حل</th>
                        <th class="p-4 text-left">عملیات</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($slas as $sla)
                        <tr class="border-t hover:bg-slate-50">

                            <td class="p-4 font-medium">
                                {{ $sla->name }}
                            </td>

                            <td class="p-4">
                                {{ $sla->priority }}
                            </td>

                            <td class="p-4">
                                {{ $sla->response_time_minutes }} دقیقه
                            </td>

                            <td class="p-4">
                                {{ $sla->resolution_time_minutes }} دقیقه
                            </td>

                            <td class="p-4 flex gap-2 justify-end">

                                <a href="{{ route('admin.sla.edit', $sla->id) }}"
                                    class="px-3 py-1 bg-blue-100 rounded-lg text-xs">
                                    ویرایش
                                </a>

                                <form action="{{ route('admin.sla.destroy', $sla->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 bg-red-100 rounded-lg text-xs">
                                        حذف
                                    </button>
                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-10 text-center text-slate-400">
                                SLA ثبت نشده
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection
