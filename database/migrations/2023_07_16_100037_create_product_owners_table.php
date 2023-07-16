<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * detail TEXT(255),
     *id INT PRIMARY KEY AUTO_INCREMENT,
     *name TEXT(255),
     *titles TEXT(255)
     */
    public function up(): void
    {
        Schema::create('product_owners', function (Blueprint $table) {
            $table->id();
            $table->text('detail');
            $table->text('name');
            $table->text('titles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_owners');
    }
};
