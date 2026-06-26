<?php

namespace App\Models\Billing;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Billing\InvoiceItem;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'user_id',
        'status',
        'subtotal',
        'discount',
        'tax',
        'total',
        'due_date',
        'paid_at',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'paid_at' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
