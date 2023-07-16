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
        Schema::create('auction_session', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');
            $table->text('description');
            $table->unsignedBigInteger('edit_history');
            $table->time('end_at');
            $table->unsignedBigInteger('ended_by');
            $table->text('goal');
            $table->unsignedBigInteger('interrupt_by');
            $table->unsignedBigInteger('level');
            $table->text('name');
            $table->integer('num_completed');
            $table->integer('num_lots');
            $table->integer('num_skipped');
            $table->text('payment_and_shipping');
            $table->unsignedBigInteger('publish_by');
            $table->time('start_at');
            $table->unsignedBigInteger('started_by');
            $table->unsignedBigInteger('terms_and_disclaimer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction_session');
    }
};
