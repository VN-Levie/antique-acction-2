<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //tạo 10 chuyên mục sản phẩm
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\en_AU\Address($faker));
        $categories = [];
        for ($i = 0; $i < 10; $i++) {
            $categories[] = [
                'name' => $faker->name,
                'slug' => $faker->slug,
                'description' => $faker->text(200),
                'thumbnail' => $faker->imageUrl(300, 300),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ];
        }
        DB::table('categories')->insert($categories);
        //tạo 100 sản phẩm
        $products = [];
        for ($i = 0; $i < 1000; $i++) {
            //fake images. Tạo ngẫu nhiên 1 6 ảnh
            $images = [];
            for ($j = 0; $j < 6; $j++) {
                $images[] = $faker->imageUrl(300, 300);
            }
            //ảnh lưu vài database dưới dạng json
            $images = json_encode($images);
            $products[] = [
                'name' => $faker->name,
                // 'slug' => $faker->slug,
                'category_id' => rand(1, 10),
                // 'price' => rand(10000, 1000000),
                // 'sale_price' => rand(10000, 1000000),
                // 'content' => $faker->text(200),
                'images' => $images,
                'added_by' => 1,
                'appraised_by' => 1,
                'auction_id' => rand(1, 50),
                'description' => $faker->text(200),
                'estimate' => json_encode([
                    'form' => rand(100, 1000),
                    'to' => rand(1000, 10000),
                    'unit' => 'USD',
                ]),
                'lot_location' => $faker->state,
                'lot_order' => rand(1, 100),
                'min_per_bid' => rand(1, 100),
                'hammer_price' => rand(10000, 1000000),
                'num_bided' => 0,
                'last_bid_id' => null,
                'category_id' => rand(1, 10),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ];
        }
        DB::table('products')->insert($products);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
