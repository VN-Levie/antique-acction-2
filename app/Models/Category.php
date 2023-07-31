<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //chỉ định bảng categories
    protected $table = 'categories';
    //mỗi danh mục có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
    //mỗi dang mục có nhiều phiên đấu giá
    public function sessions()
    {
        return $this->hasMany(Session::class, 'category_id');
    }
}
