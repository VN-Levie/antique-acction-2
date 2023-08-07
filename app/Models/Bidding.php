<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Bidding extends Model
{
    use HasFactory;
    //chỉ định tên bảng
    protected $table = 'bided_histories';

    //1 lượt đấu giá thuộc về 1 người dùng
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    //một lượt đấu giá thuộc về 1 sản phẩm
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    //1 sản phẩm có nhiều lượt đấu giá
    public function biddings(): HasMany
    {
        return $this->hasMany(Bidding::class);
    }
    //1 lượt đấu giá thuộc về 1 phiên đấu giá
    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    //get highest bidding price
    public function getHighestBiddingPrice($product_id)
    {
        $highest_bidding_price = Bidding::where('product_id', $product_id)->max('price');
        return $highest_bidding_price;
    }
    //get reserve_price
    public function getReservePrice($product_id)
    {
        $reserve_price = Product::where('id', $product_id)->value('reserve_price');
        return $reserve_price;
    }
    //get start_price
    public function getStartPrice($product_id)
    {
        $start_price = Product::where('id', $product_id)->value('start_price');
        return $start_price;
    }
    //winner
    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }

}
