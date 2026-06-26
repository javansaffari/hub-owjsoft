@extends('layouts.admin.app')

@section('title', 'تیکت‌ها')

@section('content')

    <div class="w-full space-y-6">

        <div class="bg-white border border-slate-200 rounded-2xl overflow-x-auto">

            <table class="w-full min-w-[900px] text-sm">

                <thead class="bg-slate-50 text-slate-600">
                    <tr class="text-right">
                        <th class="p-4">شماره</th>
                        <th class="p-4">کاربر</th>
                        <th class="p-4">دپارتمان</th>
                        <th class="p-4">اولویت</th>
                        <th class="p-4">وضعیت</th>
                        <th class="p-4">SLA</th>
                        <th class="p-4">تاریخ</th>
                        <th class="p-4 text-left">عملیات</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($tickets as $ticket)
                        <tr class="border-t hover:bg-slate-50 transition">

                            <td class="p-4 font-medium">
                                {{ $ticket->ticket_number }}
                            </td>

                            <td class="p-4">
                                {{ $ticket->user->name ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $ticket->department->name ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $ticket->priority }}
                            </td>

                            <td class="p-4">
                                {{ $ticket->status }}
                            </td>

                            <td class="p-4">

                                @php
                                    $sla = $ticket->sla;
                                @endphp

                                @if ($sla && $sla->response_breached)
                                    <span class="text-red-600">Breached</span>
                                @elseif($sla)
                                    <span class="text-green-600">OK</span>
                                @else
                                    <span class="text-slate-400">-</span>
                                @endif

                            </td>

                            <td class="p-4">
                                {{ $ticket->created_at->format('Y/m/d') }}
                            </td>

                            <td class="p-4 flex gap-2 justify-end">

                                <a href="{{ route('admin.tickets.show', $ticket->id) }}"
                                    class="px-3 py-1 rounded-lg bg-slate-100 text-xs">
                                    مشاهده
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="p-10 text-center text-slate-400">
                                تیکتی ثبت نشده
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection
