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
            $table->foreign('added_by')->references('id')->on('users');
            $table->foreign('appraised_by')->references('id')->on('appraisers');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('product_owner')->references('id')->on('product_owners');
            $table->foreign('belong_era')->references('id')->on('era_and_country');
            $table->foreign('country')->references('id')->on('era_and_country');

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

        });
    }
};
