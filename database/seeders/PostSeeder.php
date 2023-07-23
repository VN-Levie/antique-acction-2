<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post')->insert([
            [
                'id' => '1',
                'title' => 'Sample Post 1',
                'slug' => 'sample-post-1',
                'thumbnail' => 'img/services1.jpg',
                'description' => 'This is the first sample post.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'author' => 1,
                'category' => 1,
                'tag' => 'tag1, tag2, tag3',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'title' => 'Sample Post 2',
                'slug' => 'sample-post-2',
                'thumbnail' => 'img/services1.jpg',
                'description' => 'This is the second sample post.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'author' => 2,
                'category' => 2, 
                'tag' => 'tag2, tag4, tag5',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'title' => 'Sample Post 2',
                'slug' => 'sample-post-2',
                'thumbnail' => 'img/services1.jpg',
                'description' => 'This is the second sample post.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'author' => 2,
                'category' => 2, 
                'tag' => 'tag2, tag4, tag5',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],      [
                'id' => '2',
                'title' => 'Sample Post 2',
                'slug' => 'sample-post-2',
                'thumbnail' => 'img/services1.jpg',
                'description' => 'This is the second sample post.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'author' => 2,
                'category' => 2, 
                'tag' => 'tag2, tag4, tag5',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
