<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Role extends Model
{
    use HasFactory;

    //chỉ định tên bảng
    protected $table = 'roles';

    // role có nhiều người dùng
    public function users()
    {
        return $this->hasMany(User::class, 'role');
    }
}
