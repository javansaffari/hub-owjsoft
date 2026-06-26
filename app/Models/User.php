<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Profile;
use App\Models\Billing\Wallet;
use App\Models\Product\UserProduct;
use App\Models\Affiliate\AffiliateProfile;


#[Fillable([
    'name',
    'email',
    'password',
    'mobile',
    'password',
    'status',
    'last_login_at',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected $casts = [
        'last_login_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function products()
    {
        return $this->hasMany(UserProduct::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
    public function affiliateProfile()
    {
        return $this->hasOne(AffiliateProfile::class);
    }
}
