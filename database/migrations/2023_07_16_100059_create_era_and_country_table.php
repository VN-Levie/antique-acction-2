<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * country_name TEXT(255),
     *description TEXT(255),
     *era_name TEXT(255),
     *exist_from YEAR,
     *exist_to YEAR,
     *hitherto BOOLEAN,
     *id INT PRIMARY KEY AUTO_INCREMENT
     */
    public function up(): void
    {
        Schema::create('era_and_country', function (Blueprint $table) {
            $table->id();
            $table->text('country_name');
            $table->text('description');
            $table->text('era_name');
            $table->year('exist_from');
            $table->year('exist_to');
            $table->boolean('hitherto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('era_and_country');
    }
};
