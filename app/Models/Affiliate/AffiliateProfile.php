<?php

namespace App\Models\Models\Affiliate;

use Illuminate\Database\Eloquent\Model;

class AffiliateProfile extends Model
{
    protected $fillable = [
        'user_id',
        'referral_code',
        'commission_percent',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
