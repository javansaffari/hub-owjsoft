<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Affiliate\AffiliateProfile;
use App\Models\Affiliate\AffiliateCommission;
use App\Models\Affiliate\Referral;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $affiliates = AffiliateProfile::with('user')
            ->latest()
            ->paginate(20);

        return view('admin.affiliates.index', compact('affiliates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereDoesntHave('affiliateProfile')->get();

        return view('admin.affiliates.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'commission_rate' => 'required|numeric',
        ]);

        AffiliateProfile::create([
            'user_id' => $request->user_id,
            'code' => strtoupper('AFF' . rand(10000, 99999)),
            'commission_rate' => $request->commission_rate,
            'balance' => 0,
            'is_active' => true,
        ]);

        return redirect()->route('affiliates.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $affiliate = AffiliateProfile::with([
            'user',
            'commissions'
        ])->findOrFail($id);

        return view('admin.affiliates.show', compact('affiliate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $affiliate = AffiliateProfile::findOrFail($id);

        return view('admin.affiliates.edit', compact('affiliate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $affiliate = AffiliateProfile::findOrFail($id);

        $affiliate->update([
            'commission_rate' => $request->commission_rate,
            'is_active' => $request->is_active ?? 0,
        ]);

        return redirect()->route('affiliates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AffiliateProfile::findOrFail($id)->delete();

        return back();
    }
}
