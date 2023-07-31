<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategories extends Model
{
    use HasFactory;

    protected $table = 'post_categories';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'thumbnail',
        'description',
        'parent_id',
        'status',
        'post_count'
    ];

    public function category()
    {
        return $this->hasMany(Post::class, 'category');
    }
}
