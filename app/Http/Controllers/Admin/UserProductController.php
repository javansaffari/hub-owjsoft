<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product\UserProduct;
use App\Models\User;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index()
    {
        $userProducts = UserProduct::with(['user', 'product'])
            ->latest()
            ->paginate(15);

        return view('admin.orders.index', compact('userProducts'));
    }

    public function create()
    {
        $users = User::all();
        $products = Product::all();

        return view('admin.orders.create', compact('users', 'products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'status' => 'required',
            'billing_type' => 'required',
            'quantity' => 'required|integer',
            'unit_price' => 'nullable',
        ]);

        UserProduct::create($data);

        return redirect()->route('admin.orders.index');
    }

    public function show(UserProduct $userProduct)
    {
        return view('admin.orders.show', compact('userProduct'));
    }
}
