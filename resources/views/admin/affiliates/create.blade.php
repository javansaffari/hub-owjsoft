@extends('layouts.admin.app')

@section('title', 'ایجاد افیلیت')

@section('content')

    <form method="POST" action="{{ route('admin.affiliates.store') }}">
        @csrf

        <div class="max-w-2xl mx-auto space-y-6">

            <div class="bg-white border rounded-2xl p-6 space-y-5">

                <div>
                    <label>کاربر</label>
                    <select name="user_id" class="w-full h-12 border rounded-xl">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>درصد کمیسیون</label>
                    <input name="commission_rate" type="number" class="w-full h-12 border rounded-xl" value="10">
                </div>

            </div>

            <button class="w-full h-12 bg-[#EF443B] text-white rounded-xl">
                ذخیره
            </button>

        </div>

    </form>

@endsection
