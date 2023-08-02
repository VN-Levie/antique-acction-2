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
        Schema::table('appraisers', function (Blueprint $table) {
            //thêm cột user_id vào bảng appraisers và tạo khóa ngoại
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appraisers', function (Blueprint $table) {
            // huỷ khoá ngoại
            $table->dropForeign(['user_id']);
            // xóa cột user_id
            $table->dropColumn('user_id');
        });
    }
};
