<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feedbackData = [
            [
                'content' => ' In forty-three years of antiquarian bookselling, we have come across many old and rare books that are in need of care and restoration. We are very grateful for the loving attention they get from Christian',
                'pinned' => 0,
                'author' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Diana has been,  and continues to be, my binder of choice for over ten years. In reference to my specialization in 18th century books, her restoration and rebinding is state of the art was perfect!',
                'pinned' => 1,
                'author' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'content' => 'Diana has been,  and continues to be, my binder of choice for over ten years. In reference to my specialization in 18th century books, her restoration and rebinding is state of the art was perfect!',
                'pinned' => 3,
                'author' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Diana has been,  and continues to be, my binder of choice for over ten years. In reference to my specialization in 18th century books, her restoration and rebinding is state of the art was perfect!',
                'pinned' => 4,
                'author' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('feedback')->insert($feedbackData);
    }
}
