<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'description',
        'content',
        'author',
        'category',
        'tag',
        'status',
        'created_at',
    ];

    // Liên kết với mô hình User
    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
