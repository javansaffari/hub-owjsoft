@extends('layouts.admin.app')

@section('title', 'لاگ سیستم')

@section('content')

    <div class="w-full space-y-6">

        {{-- TABLE --}}
        <div class="bg-white border border-slate-200 rounded-2xl overflow-x-auto">

            <table class="w-full min-w-[950px] text-sm">

                <thead class="bg-slate-50 text-slate-600">
                    <tr class="text-right">
                        <th class="p-4">کاربر</th>
                        <th class="p-4">رویداد</th>
                        <th class="p-4">مدل</th>
                        <th class="p-4">توضیحات</th>
                        <th class="p-4">IP</th>
                        <th class="p-4">تاریخ</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($logs as $log)
                        <tr class="border-t hover:bg-slate-50 transition">

                            {{-- USER --}}
                            <td class="p-4 font-medium">
                                {{ $log->user->name ?? 'سیستم' }}
                            </td>

                            {{-- EVENT --}}
                            <td class="p-4">

                                @switch($log->event)
                                    @case('create')
                                        <span class="px-3 py-1 rounded-lg text-xs bg-green-100 text-green-700">
                                            ایجاد
                                        </span>
                                    @break

                                    @case('update')
                                        <span class="px-3 py-1 rounded-lg text-xs bg-blue-100 text-blue-700">
                                            ویرایش
                                        </span>
                                    @break

                                    @case('delete')
                                        <span class="px-3 py-1 rounded-lg text-xs bg-red-100 text-red-700">
                                            حذف
                                        </span>
                                    @break

                                    @case('login')
                                        <span class="px-3 py-1 rounded-lg text-xs bg-slate-100 text-slate-700">
                                            ورود
                                        </span>
                                    @break

                                    @default
                                        <span class="px-3 py-1 rounded-lg text-xs bg-slate-100 text-slate-700">
                                            {{ $log->event }}
                                        </span>
                                @endswitch

                            </td>

                            {{-- MODEL --}}
                            <td class="p-4 text-slate-600">
                                {{ class_basename($log->entity_type) }} #{{ $log->entity_id }}
                            </td>

                            {{-- DESCRIPTION --}}
                            <td class="p-4 text-slate-600">
                                {{ $log->description ?? '-' }}
                            </td>

                            {{-- IP --}}
                            <td class="p-4 text-slate-500">
                                {{ $log->ip_address ?? '-' }}
                            </td>

                            {{-- DATE --}}
                            <td class="p-4 text-slate-500">
                                {{ $log->created_at->format('Y/m/d H:i:s') }}
                            </td>

                        </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="p-10 text-center text-slate-400">
                                    هیچ لاگی ثبت نشده است
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- PAGINATION --}}
            <div class="flex justify-center">
                {{ $logs->links() }}
            </div>

        </div>

    @endsection
