@extends('layouts.admin.app')

@section('title', 'ایجاد دپارتمان')

@section('content')

    <form method="POST" action="{{ route('admin.departments.store') }}">
        @csrf

        <div class="max-w-2xl mx-auto space-y-6">

            <div class="bg-white border border-slate-200 rounded-2xl p-6 space-y-5">

                <div class="relative">

                    <label class="absolute -top-2 right-3 bg-white px-1 text-xs text-slate-500">
                        نام دپارتمان
                    </label>

                    <input type="text" name="name"
                        class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#EF443B] focus:ring-0">
                </div>

                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox" name="is_active" checked class="accent-[#EF443B]">
                    فعال باشد
                </label>

            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-4">

                <button class="w-full h-12 rounded-xl bg-[#EF443B] text-white font-bold">
                    ذخیره دپارتمان
                </button>

            </div>

        </div>

    </form>

@endsection
