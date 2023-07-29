<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Session extends Model
{

    use HasFactory;
    //chỉ định tên bảng
    protected $table = 'auction_session';

    //mỗi phiên đấu giá có nhiều sản phẩm
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_id');
    }
    //mối quan hệ với bảng category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    // Mối quan hệ với user bắt đầu phiên đấu giá
    public function createdBy(): BelongsTo
    {
        // Truyền vào tên class User và tên trường khóa ngoại created_by
        return $this->belongsTo(User::class, 'created_by');
    }

    // Mối quan hệ với user kết thúc phiên đấu giá
    public function endedBy(): BelongsTo
    {
        // Truyền vào tên class User và tên trường khóa ngoại ended_by
        return $this->belongsTo(User::class, 'ended_by');
    }
    // Mối quan hệ với user giản đoạn phiên đấu giá | interrupt_by
    public function interruptedBy(): BelongsTo
    {
        // Truyền vào tên class User và tên trường khóa ngoại interrupted_by
        return $this->belongsTo(User::class, 'interrupted_by');
    }
    // Mối quan hệ với terms and disclaimer
    public function termsAndDisclaimer(): HasOne
    {
        // Truyền vào tên class TermsAndDisclaimer
        return $this->hasOne(TermsAndDisclaimer::class);
    }




}
