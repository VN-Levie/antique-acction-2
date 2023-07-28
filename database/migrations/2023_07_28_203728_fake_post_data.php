<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $fake = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('post_categories')->insert([
                'name' => $fake->name,
                'slug' => $fake->slug,
                'status' => 1,
                'thumbnail' => $fake->imageUrl(),
                'description' => $fake->text,
                'parent_id' => 0,
                'post_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        //tạo 100 bài viết ở bảng posts
        for ($i = 0; $i < 100; $i++) {
            DB::table('post')->insert([
                'title' => $fake->name,
                'slug' => $fake->slug,
                'status' => 1,
                'thumbnail' => $fake->imageUrl(),
                'description' => $fake->text,
                'content' => $fake->text,
                // 'view_count' => 0,
                'author' => 1,
                'category' => rand(1, 10),
                'tag' => $fake->text,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //delete all post and post_categories
        DB::table('posts')->truncate();
        DB::table('post_categories')->truncate();

    }
};
