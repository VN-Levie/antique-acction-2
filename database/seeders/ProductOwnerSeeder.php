<?php

namespace Database\Seeders;

use App\Models\ProductOwner;
use Database\Factories\ProductOwnerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductOwnerFactory::factoryForModel(ProductOwner::class)->count(5)->create();
    }
}
