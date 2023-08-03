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
        Schema::table('bided_histories', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('auction_session')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bided_histories', function (Blueprint $table) {
            //huỷ khóa ngoại
            $table->dropForeign(['product_id']);
            $table->dropForeign(['session_id']);
            $table->dropForeign(['user_id']);
        });
    }
};
