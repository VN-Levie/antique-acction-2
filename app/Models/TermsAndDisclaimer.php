<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TermsAndDisclaimer extends Model
{
    use HasFactory;
    //chỉ định bảng terms_and_disclaimer
    protected $table = 'terms_and_disclaimer';

    // Mối quan hệ với auction session
    public function auctionSession(): BelongsTo
    {
        // Truyền vào tên class AuctionSession
        return $this->belongsTo(AuctionSession::class);
    }
}
