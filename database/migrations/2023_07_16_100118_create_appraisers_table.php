<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *biography TEXT(255),
     *id INT PRIMARY KEY AUTO_INCREMENT,
     *name TEXT(255),
     *titles TEXT(255)
     */
    public function up(): void
    {
        Schema::create('appraisers', function (Blueprint $table) {
            $table->id();
            $table->text('biography');
            $table->text('name');
            $table->text('titles');
            $table->timestamps();
        });
        //tạo 10 chuyên gia định giá
        $faker = Faker\Factory::create();
        $appraisers = [];
        for ($i = 0; $i < 10; $i++) {
            $appraisers[] = [
                'biography' => $faker->text(255),
                'name' => $faker->name(),
                'titles' => $faker->text(255),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ];
        }
        DB::table('appraisers')->insert($appraisers);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appraisers');
    }
};
