<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'id',
        'content',
        'pinned',
        'author',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
