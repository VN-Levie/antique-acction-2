<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KYC extends Model
{
    protected $fillable = [
        'full_name', 'address', 'id_card_path', 'proof_of_address_path',
    ];
    use HasFactory;
    //chỉ định bảng addresses
    protected $table = 'kyc';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
