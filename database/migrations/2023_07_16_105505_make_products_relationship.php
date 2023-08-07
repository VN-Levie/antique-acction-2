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
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('appraised_by')->references('id')->on('appraisers')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('product_owner')->references('id')->on('product_owners')->onDelete('cascade');
            $table->foreign('belong_era')->references('id')->on('era_and_country')->onDelete('cascade');
            $table->foreign('country')->references('id')->on('era_and_country')->onDelete('cascade');
            $table->foreign('last_bid')->references('id')->on('bided_histories')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // huỷ khóa ngoại
            $table->dropForeign(['added_by']);
            $table->dropForeign(['appraised_by']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['product_owner']);
            $table->dropForeign(['belong_era']);
            $table->dropForeign(['country']);
            $table->dropForeign(['last_bid']);



        });
    }
};
