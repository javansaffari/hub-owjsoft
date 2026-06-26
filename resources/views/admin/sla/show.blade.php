@extends('layouts.admin.app')

@section('title', 'جزئیات تیکت')

@section('action')

    <a href="{{ route('admin.tickets.index') }}"
        class="h-11 px-5 flex items-center rounded-xl bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition">
        بازگشت به لیست
    </a>

@endsection

@section('content')

    <div class="w-full space-y-6" x-data="ticketShow()" x-init="init()">

        {{-- هدر --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-6">

            <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4">

                <div class="space-y-3">

                    <div class="text-xl font-bold">
                        {{ $ticket->ticket_number }}
                    </div>

                    <div class="text-sm text-slate-500">
                        مشتری: {{ $ticket->user->name ?? '-' }}
                    </div>

                    <div class="flex flex-wrap gap-2 text-xs">

                        <span class="px-3 py-1 rounded-lg bg-slate-100">
                            {{ $ticket->department->name ?? 'بدون دپارتمان' }}
                        </span>

                        <span
                            class="px-3 py-1 rounded-lg
                        @if ($ticket->priority === 'critical') bg-red-100 text-red-700
                        @elseif($ticket->priority === 'high') bg-orange-100 text-orange-700
                        @elseif($ticket->priority === 'medium') bg-yellow-100 text-yellow-700
                        @else bg-green-100 text-green-700 @endif">
                            {{ $ticket->priority }}
                        </span>

                        <span
                            class="px-3 py-1 rounded-lg
                        @if ($ticket->status === 'open') bg-blue-100 text-blue-700
                        @elseif($ticket->status === 'pending') bg-yellow-100 text-yellow-700
                        @elseif($ticket->status === 'answered') bg-indigo-100 text-indigo-700
                        @elseif($ticket->status === 'resolved') bg-green-100 text-green-700
                        @else bg-slate-200 text-slate-700 @endif">
                            {{ $ticket->status }}
                        </span>

                    </div>

                </div>

                <div class="text-left text-xs text-slate-400 space-y-1">
                    <div>ایجاد: {{ $ticket->created_at->format('Y/m/d H:i:s') }}</div>

                    <div class="font-medium text-slate-600">
                        زمان سپری شده: <span x-text="elapsed"></span>
                    </div>
                </div>

            </div>

        </div>

        {{-- SLA --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-6">

            <h2 class="text-lg font-bold mb-5">SLA</h2>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 text-sm">

                <div class="p-4 rounded-xl bg-slate-50">
                    <div class="text-slate-500">مهلت پاسخ</div>
                    <div class="font-bold">
                        {{ $sla?->response_due_at?->format('Y/m/d H:i:s') ?? '-' }}
                    </div>
                    <div class="text-xs mt-2 text-slate-700">
                        <span x-text="responseCountdown"></span>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-50">
                    <div class="text-slate-500">مهلت حل</div>
                    <div class="font-bold">
                        {{ $sla?->resolution_due_at?->format('Y/m/d H:i:s') ?? '-' }}
                    </div>
                    <div class="text-xs mt-2 text-slate-700">
                        <span x-text="resolutionCountdown"></span>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-50">
                    <div class="text-slate-500">اولین پاسخ</div>
                    <div class="font-bold">
                        {{ $sla?->first_response_at?->format('Y/m/d H:i:s') ?? '-' }}
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-50">
                    <div class="text-slate-500">حل شده</div>
                    <div class="font-bold">
                        {{ $sla?->resolved_at?->format('Y/m/d H:i:s') ?? '-' }}
                    </div>
                </div>

            </div>

        </div>

        {{-- پیام‌ها --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-6">

            <h2 class="text-lg font-bold mb-5">گفتگو</h2>

            <div class="space-y-4 max-h-[500px] overflow-y-auto">

                @forelse($ticket->messages as $message)
                    <div class="flex {{ $message->user_id == auth()->id() ? 'justify-end' : 'justify-start' }}">

                        <div
                            class="max-w-[80%] rounded-2xl p-4 border
                        {{ $message->user_id == auth()->id()
                            ? 'bg-[#EF443B] text-white border-[#EF443B]'
                            : 'bg-slate-50 border-slate-200' }}">

                            <div class="flex justify-between text-xs mb-2 opacity-70">
                                <span>{{ $message->user->name ?? '-' }}</span>
                                <span>{{ $message->created_at->format('H:i:s') }}</span>
                            </div>

                            <div class="text-sm leading-6 whitespace-pre-line">
                                {{ $message->message }}
                            </div>

                        </div>

                    </div>

                @empty
                    <div class="text-center text-slate-400 py-10">
                        پیامی ثبت نشده
                    </div>
                @endforelse

            </div>

            {{-- ارسال پیام --}}
            <form class="mt-6 flex gap-3">

                <textarea name="message" rows="2"
                    class="flex-1 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0 p-3"
                    placeholder="پیام خود را بنویسید..."></textarea>

                <button type="submit"
                    class="px-6 rounded-xl bg-[#EF443B] text-white font-medium hover:bg-[#dd372f] transition">
                    ارسال
                </button>

            </form>

        </div>

        {{-- فایل‌ها --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-6">

            <h2 class="text-lg font-bold mb-5">فایل‌های پیوست</h2>

            <div class="flex flex-wrap gap-3">

                @forelse($ticket->attachments as $file)
                    <a href="{{ asset($file->file_path) }}"
                        class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-sm">
                        {{ $file->file_name }}
                    </a>

                @empty
                    <div class="text-slate-400 text-sm">
                        فایل پیوستی وجود ندارد
                    </div>
                @endforelse

            </div>

        </div>

    </div>

    <script>
        function ticketShow() {
            return {

                elapsed: '',
                responseCountdown: '',
                resolutionCountdown: '',

                init() {
                    this.tick();
                    setInterval(() => this.tick(), 1000);
                },

                tick() {

                    const now = new Date();

                    const createdAt = new Date(@json($ticket->created_at));
                    const responseDue = new Date(@json($sla?->response_due_at));
                    const resolutionDue = new Date(@json($sla?->resolution_due_at));

                    this.elapsed = this.formatTime(createdAt, now);

                    this.responseCountdown = this.formatRemaining(responseDue, now);
                    this.resolutionCountdown = this.formatRemaining(resolutionDue, now);
                },

                formatTime(start, end) {
                    const diff = Math.floor((end - start) / 1000);

                    const h = Math.floor(diff / 3600);
                    const m = Math.floor((diff % 3600) / 60);
                    const s = diff % 60;

                    return `${h} ساعت ${m} دقیقه ${s} ثانیه`;
                },

                formatRemaining(target, now) {

                    if (!target) return '-';

                    let diff = Math.floor((target - now) / 1000);

                    if (diff <= 0) {
                        return 'زمان پایان یافته';
                    }

                    const h = Math.floor(diff / 3600);
                    const m = Math.floor((diff % 3600) / 60);
                    const s = diff % 60;

                    return `${h} ساعت ${m} دقیقه ${s} ثانیه`;
                }
            }
        }
    </script>

@endsection
