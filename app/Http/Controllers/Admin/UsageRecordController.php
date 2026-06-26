<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product\UsageRecord;
use App\Models\Product\UserProduct;
use Illuminate\Http\Request;

class UsageRecordController extends Controller
{
    public function index()
    {
        $records = UsageRecord::with(['user', 'product', 'userProduct'])
            ->latest()
            ->paginate(20);

        return view('admin.orders.index', compact('records'));
    }

    public function create()
    {
        $userProducts = UserProduct::with('product', 'user')->get();

        return view('admin.orders.create', compact('userProducts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_product_id' => 'required',
            'user_id' => 'required',
            'product_id' => 'required',
            'usage_type' => 'required',
            'quantity' => 'required',
        ]);

        UsageRecord::create($data);

        // آپدیت usage مصرف
        $up = UserProduct::find($request->user_product_id);
        $up->increment('usage_used', $request->quantity);

        return redirect()->route('admin.orders.index');
    }
}
