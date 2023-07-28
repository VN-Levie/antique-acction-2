<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'description' => $this->faker->paragraph,
            'estimate' => $this->faker->randomFloat(2, 100, 1000),
            'hammer_price' => $this->faker->randomNumber(),
            'images' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl()]),
            'last_bid' => $this->faker->randomNumber(),
            'lot_location' => $this->faker->address,
            'lot_order' => $this->faker->randomNumber(),
            'min_per_bid' => $this->faker->randomNumber(),
            'name' => $this->faker->word,
            'num_bided' => $this->faker->randomNumber(),
            'product_owner' => $this->faker->randomNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
