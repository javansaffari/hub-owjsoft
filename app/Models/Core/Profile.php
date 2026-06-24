<?php

namespace App\Models\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'national_code',
        'company_name',
        'registration_number',
        'economic_code',
        'address',
        'city',
        'state',
        'postal_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
