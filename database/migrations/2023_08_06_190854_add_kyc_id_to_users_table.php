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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('kyc_id')->default(null)->nullable();
            $table->foreign('kyc_id')->references('id')->on('kyc')->onDelete('set null');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //huỷ khóa ngoại
            $table->dropForeign(['user_id']);
            //huy cot
            $table->dropColumn('kyc_id');
        });
    }
};
