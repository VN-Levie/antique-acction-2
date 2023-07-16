<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *  id INT PRIMARY KEY AUTO_INCREMENT,
     *price_bided INT,
     *product_id INT,
     *session_id INT,
     *user_id INT
     */
    public function up(): void
    {
        Schema::create('bided_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('price_bided');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bided_histories');
    }
};
