<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable implements MustVerifyEmail
{

    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'phoneNumber', 'password', 'status', 'token',  'addresses', 'kyc', 'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //1 user có nhiều địa chỉ
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    //1 user có 1 role lấy từ bảng roles
    public function roles(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role');
    }

    //1 user có nhiều sản phẩm
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'added_by');
    }
    //1 user có 1 Id_cards lấy từ bảng roles
    public function kyc(): belongsTo
    {
        return $this->belongsTo(KYC::class, 'kyc_id');
    }

    //1 user có nhiều phiên đấu giá
    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class, 'user_id');
    }

    public function test()
    {
        return 'test';
    }
}
