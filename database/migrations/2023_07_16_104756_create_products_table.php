<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('added_by');
            $table->unsignedBigInteger('appraised_by')->nullable();
            $table->unsignedBigInteger('auction_id');
            $table->unsignedBigInteger('belong_era')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('country')->nullable();
            $table->text('description');
            $table->json('estimate');
            $table->bigInteger('hammer_price');
            $table->json('images');
            $table->bigInteger('last_bid');
            $table->text('lot_location');
            $table->integer('lot_order');
            $table->integer('min_per_bid');
            $table->text('name');
            $table->integer('num_bided');
            $table->unsignedBigInteger('product_owner')->nullable();
            $table->timestamps();
            $table->foreign('auction_id')->references('id')->on('auction_session');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
