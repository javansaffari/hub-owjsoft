<?php

namespace App\Models\Affiliate;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AffiliateProfile extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'commission_rate',
        'balance',
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commissions()
    {
        return $this->hasMany(AffiliateCommission::class, 'referrer_user_id', 'user_id');
    }
}
