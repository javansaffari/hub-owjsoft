@extends('layouts.admin.app')

@section('title', 'ایجاد SLA')

@section('content')

    <form method="POST">
        @csrf

        <div class="max-w-3xl mx-auto space-y-6">

            <div class="bg-white border rounded-2xl p-6 space-y-5">

                <div class="grid grid-cols-1 gap-5">

                    <div class="relative">
                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            نام SLA
                        </label>

                        <input type="text" name="name"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B]">
                    </div>

                    <div class="relative">
                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            اولویت
                        </label>

                        <select name="priority" class="w-full h-12 px-4 rounded-xl border border-slate-300">
                            <option value="low">کم</option>
                            <option value="medium">متوسط</option>
                            <option value="high">زیاد</option>
                            <option value="critical">بحرانی</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-5">

                        <div class="relative">
                            <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                                زمان پاسخ (دقیقه)
                            </label>

                            <input type="number" name="response_time_minutes"
                                class="w-full h-12 px-4 rounded-xl border border-slate-300">
                        </div>

                        <div class="relative">
                            <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                                زمان حل (دقیقه)
                            </label>

                            <input type="number" name="resolution_time_minutes"
                                class="w-full h-12 px-4 rounded-xl border border-slate-300">
                        </div>

                    </div>

                </div>

            </div>

            <div class="bg-white border rounded-2xl p-4">
                <button class="w-full h-12 bg-[#EF443B] text-white rounded-xl">
                    ذخیره SLA
                </button>
            </div>

        </div>

    </form>

@endsection
