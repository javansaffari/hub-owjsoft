<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Billing\Invoice;


class UserProduct extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'invoice_id',

        'billing_type',
        'status',

        'quantity',
        'unit_price',

        'started_at',
        'expires_at',
        'next_billing_at',
        'canceled_at',

        'usage_limit',
        'usage_used',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'expires_at' => 'datetime',
        'next_billing_at' => 'datetime',
        'canceled_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function usageRecords()
    {
        return $this->hasMany(UsageRecord::class);
    }

    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isExpired()
    {
        return $this->expires_at && now()->greaterThan($this->expires_at);
    }

    public function remainingUsage()
    {
        if (!$this->usage_limit) {
            return null;
        }

        return max(0, $this->usage_limit - $this->usage_used);
    }

    public function usagePercent()
    {
        if (!$this->usage_limit || $this->usage_limit == 0) {
            return null;
        }

        return round(($this->usage_used / $this->usage_limit) * 100, 2);
    }
}
