@extends('layouts.admin.app')

@section('title', 'مشتریان')

@section('action')

    <a href="{{ route('admin.users.create') }}"
        class="h-11 px-5 flex items-center rounded-xl bg-[#EF443B] text-white font-medium hover:bg-[#dd372f] transition">

        + ایجاد مشتری
    </a>

@endsection

@section('content')

    <div class="w-full space-y-6">

        <div class="bg-white border border-slate-200 rounded-2xl overflow-x-auto">

            <table class="w-full min-w-[900px] text-sm">

                <thead class="bg-slate-50 text-slate-600">
                    <tr class="text-right">
                        <th class="p-4">نام</th>
                        <th class="p-4">موبایل</th>
                        <th class="p-4">ایمیل</th>
                        <th class="p-4">نوع مشتری</th>
                        <th class="p-4">کد ملی / شناسه ملی</th>
                        <th class="p-4">شهر</th>
                        <th class="p-4">تاریخ ثبت</th>
                        <th class="p-4 text-left">عملیات</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($users as $user)
                        <tr class="border-t hover:bg-slate-50 transition">

                            <td class="p-4 font-medium">
                                {{ $user->name }}
                            </td>

                            <td class="p-4">
                                {{ $user->mobile ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $user->email ?? '-' }}
                            </td>

                            <td class="p-4">

                                @if ($user->type === 'individual')
                                    <span class="px-3 py-1 rounded-lg bg-blue-100 text-blue-700 text-xs">
                                        حقیقی
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-lg bg-purple-100 text-purple-700 text-xs">
                                        حقوقی
                                    </span>
                                @endif

                            </td>

                            <td class="p-4">
                                {{ $user->national_code ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $user->city ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $user->created_at->format('Y/m/d') }}
                            </td>

                            <td class="p-4 flex gap-2 justify-end">

                                <a href="{{ route('admin.users.show', $user->id) }}"
                                    class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-xs">
                                    مشاهده
                                </a>

                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="px-3 py-1 rounded-lg bg-blue-100 hover:bg-blue-200 text-xs">
                                    ویرایش
                                </a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
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
                            <td colspan="8" class="p-10 text-center text-slate-400">
                                هیچ مشتری ثبت نشده
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="flex justify-center pt-4">
            {{ $users->links() }}
        </div>

    </div>

@endsection
