@extends('layouts.admin.app')

@section('title', 'محصولات')

@section('action')

    <a href="{{ route('admin.products.create') }}"
        class="h-11 px-5 flex items-center rounded-xl bg-[#EF443B] text-white font-medium hover:bg-[#dd372f] transition">

        + ایجاد محصول
    </a>

@endsection

@section('content')

    <div class="w-full space-y-6">

        {{-- TABLE --}}
        <div class="bg-white border border-slate-200 rounded-2xl overflow-x-auto">

            <table class="w-full min-w-[950px] text-sm">

                <thead class="bg-slate-50 text-slate-600">
                    <tr class="text-right">

                        <th class="p-4">نام محصول</th>
                        <th class="p-4">نوع</th>
                        <th class="p-4">دوره / چرخه</th>
                        <th class="p-4">قیمت</th>
                        <th class="p-4">وضعیت</th>
                        <th class="p-4">تاریخ ایجاد</th>
                        <th class="p-4 text-left">عملیات</th>

                    </tr>
                </thead>

                <tbody>

                    @forelse($products as $product)
                        <tr class="border-t hover:bg-slate-50 transition">

                            {{-- NAME --}}
                            <td class="p-4 font-medium">
                                {{ $product->name }}
                            </td>

                            {{-- TYPE --}}
                            <td class="p-4 text-slate-600">

                                @if ($product->type === 'subscription')
                                    اشتراکی
                                @elseif($product->type === 'pay_as_you_go')
                                    پرداخت به میزان مصرف
                                @else
                                    یکبار مصرف
                                @endif

                            </td>

                            {{-- CYCLE --}}
                            <td class="p-4 text-slate-600">
                                {{ $product->billing_cycle ?? '-' }}
                            </td>

                            {{-- PRICE --}}
                            <td class="p-4 font-semibold">
                                {{ number_format($product->price) }} تومان
                            </td>

                            {{-- STATUS --}}
                            <td class="p-4">

                                @if ($product->is_active)
                                    <span class="px-3 py-1 text-xs rounded-lg bg-green-100 text-green-700">
                                        فعال
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs rounded-lg bg-red-100 text-red-700">
                                        غیرفعال
                                    </span>
                                @endif

                            </td>

                            {{-- DATE --}}
                            <td class="p-4 text-slate-500">
                                {{ $product->created_at->format('Y/m/d') }}
                            </td>

                            {{-- ACTIONS --}}
                            <td class="p-4 flex gap-2 justify-end">

                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                    class="px-3 py-1 rounded-lg bg-blue-100 hover:bg-blue-200 text-xs">
                                    ویرایش
                                </a>

                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
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
                            <td colspan="7" class="p-10 text-center text-slate-400">
                                هیچ محصولی ثبت نشده است
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="flex justify-center">
            {{ $products->links() }}
        </div>

    </div>

@endsection
