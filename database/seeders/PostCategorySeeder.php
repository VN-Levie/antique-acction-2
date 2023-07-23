<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_categories')->insert([
            [
                'name' => 'Category 1',
                'slug' => 'category-1',
                'thumbnail' => 'path/to/thumbnail1.jpg',
                'description' => 'This is the first sample category.',
                'parent_id' => 1,
                'status' => 'active',
                'post_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 2',
                'slug' => 'category-2',
                'thumbnail' => 'path/to/thumbnail2.jpg',
                'description' => 'This is the second sample category.',
                'parent_id' => 1,
                'status' => 'active',
                'post_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 2',
                'slug' => 'category-2',
                'thumbnail' => 'path/to/thumbnail2.jpg',
                'description' => 'This is the second sample category.',
                'parent_id' => 1,
                'status' => 'active',
                'post_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Category 2',
                'slug' => 'category-2',
                'thumbnail' => 'path/to/thumbnail2.jpg',
                'description' => 'This is the second sample category.',
                'parent_id' => 1,
                'status' => 'active',
                'post_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
