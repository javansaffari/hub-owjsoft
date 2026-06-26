@extends('layouts.admin.app')

@section('title', 'ایجاد تیکت')

@section('action')

    <a href="{{ route('admin.tickets.index') }}"
        class="h-11 px-5 flex items-center rounded-xl bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition">
        بازگشت
    </a>

@endsection

@section('content')

    <form action="" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="w-full space-y-6" x-data="ticketCreate()">

            {{-- اطلاعات اصلی --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">ایجاد تیکت جدید</h2>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                    {{-- مشتری --}}
                    <div class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            مشتری
                        </label>

                        <select name="user_id"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0 bg-white">

                            <option value="">انتخاب مشتری</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                    {{-- دپارتمان --}}
                    <div class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            دپارتمان
                        </label>

                        <select name="department_id"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0 bg-white">

                            <option value="">بدون دپارتمان</option>

                            @foreach ($departments as $dep)
                                <option value="{{ $dep->id }}">
                                    {{ $dep->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                    {{-- اولویت --}}
                    <div class="relative">

                        <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                            اولویت
                        </label>

                        <select name="priority"
                            class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0 bg-white">

                            <option value="low">کم</option>
                            <option value="medium" selected>متوسط</option>
                            <option value="high">زیاد</option>
                            <option value="critical">بحرانی</option>

                        </select>

                    </div>

                </div>

            </div>

            {{-- پیام اولیه --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">متن تیکت</h2>

                <div class="relative">

                    <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                        توضیحات
                    </label>

                    <textarea name="message" rows="6"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0"></textarea>

                </div>

            </div>

            {{-- پیوست --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6">

                <h2 class="text-lg font-bold mb-6">پیوست فایل</h2>

                <input type="file" name="attachments[]" multiple
                    class="w-full text-sm border border-slate-300 rounded-xl p-3 bg-white">

                <p class="text-xs text-slate-400 mt-2">
                    می‌توانید چند فایل انتخاب کنید
                </p>

            </div>

            {{-- دکمه --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-4">

                <button type="submit"
                    class="w-full h-12 rounded-xl bg-[#EF443B] hover:bg-[#dd372f] text-white font-bold transition">
                    ثبت تیکت
                </button>

            </div>

        </div>

    </form>

    <script>
        function ticketCreate() {
            return {
                init() {}
            }
        }
    </script>

@endsection
