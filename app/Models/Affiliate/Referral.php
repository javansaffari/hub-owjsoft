<?php

namespace App\Models\Affiliate;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
        'affiliate_profile_id',
        'referred_user_id',
        'ip',
        'user_agent'
    ];

    public function affiliate()
    {
        return $this->belongsTo(AffiliateProfile::class);
    }
}
