<?php

namespace App\Models\Affiliate;

use Illuminate\Database\Eloquent\Model;

class AffiliateCommission extends Model
{
    protected $fillable = [
        'affiliate_profile_id',
        'invoice_id',
        'amount',
        'status'
    ];

    public function affiliate()
    {
        return $this->belongsTo(AffiliateProfile::class, 'affiliate_profile_id');
    }
}
