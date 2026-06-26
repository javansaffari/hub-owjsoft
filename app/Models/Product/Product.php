<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'description',
        'price',
        'billing_cycle',
        'is_active',
    ];

    public function userProducts()
    {
        return $this->hasMany(UserProduct::class);
    }
}
