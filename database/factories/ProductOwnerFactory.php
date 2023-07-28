<?php

namespace Database\Factories;

use App\Models\ProductOwner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductOwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductOwner::class;
    public function definition(): array
    {
        return [
            'detail' => $this->faker->paragraph,
            'name' => $this->faker->name,
            'titles' => $this->faker->words(3, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
