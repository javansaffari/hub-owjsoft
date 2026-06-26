@extends('layouts.admin.app')

@section('title', 'دپارتمان‌ها')

@section('action')

    <a href="{{ route('admin.departments.create') }}"
        class="h-11 px-5 flex items-center rounded-xl bg-[#EF443B] text-white font-medium hover:bg-[#dd372f] transition">

        + ایجاد دپارتمان
    </a>

@endsection

@section('content')

    <div class="w-full space-y-6">

        <div class="bg-white border border-slate-200 rounded-2xl overflow-x-auto">

            <table class="w-full min-w-[700px] text-sm">

                <thead class="bg-slate-50 text-slate-600">
                    <tr class="text-right">
                        <th class="p-4">نام دپارتمان</th>
                        <th class="p-4">وضعیت</th>
                        <th class="p-4 text-left">عملیات</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($departments as $department)
                        <tr class="border-t hover:bg-slate-50 transition">

                            <td class="p-4 font-medium">
                                {{ $department->name }}
                            </td>

                            <td class="p-4">

                                @if ($department->is_active)
                                    <span class="px-3 py-1 rounded-lg bg-green-100 text-green-700 text-xs">
                                        فعال
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-lg bg-red-100 text-red-700 text-xs">
                                        غیرفعال
                                    </span>
                                @endif

                            </td>

                            <td class="p-4 flex gap-2 justify-end">

                                <a href="{{ route('admin.departments.edit', $department->id) }}"
                                    class="px-3 py-1 rounded-lg bg-blue-100 hover:bg-blue-200 text-xs">
                                    ویرایش
                                </a>

                                <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 rounded-lg bg-red-100 hover:bg-red-200 text-xs">
                                        حذف
                                    </button>
                                </form>

                            </td>

                        </tr>
                    @empty

                        <tr>
                            <td colspan="3" class="p-10 text-center text-slate-400">
                                دپارتمانی ثبت نشده
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection
