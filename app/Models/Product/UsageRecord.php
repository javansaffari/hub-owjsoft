<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;


class UsageRecord extends Model
{
    protected $fillable = [
        'user_product_id',
        'user_id',
        'product_id',
        'usage_type',
        'quantity',
        'unit',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function userProduct()
    {
        return $this->belongsTo(UserProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
