<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    //mỗi sản phẩm chỉ thuộc 1 phiên đấu giá
    public function session()
    {
        return $this->belongsTo(Session::class, 'auction_id');
    }

    //mỗi sản phẩm chỉ thuộc 1 danh mục
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    //mỗi sản phẩm được tạo mởi 1 người dùng | added_by
    public function user()
    {
        return $this->belongsTo(User::class,'added_by');
    }
    //mỡi sản phẩm chỉ được kiểm duyệt bởi 1 chuyên gia | appraised_by
    public function appraised_by()
    {
        return $this->belongsTo(Appraiser::class,'appraised_by');
    }
}
