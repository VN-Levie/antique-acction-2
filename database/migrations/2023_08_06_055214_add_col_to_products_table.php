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
            //giá dự phòng: reserve_price
            $table->bigInteger('reserve_price')->default(0);
            //giá khởi điểm: start_price
            $table->bigInteger('start_price')->default(0);
            //status: 0: chưa bắt đầu, 1: đang đấu giá, 2: đã kết thúc
            $table->integer('status')->default(0);
            //winner_id: id người thắng/ liên kết khoá ngoại với bảng users
            $table->unsignedBigInteger('winner_id')->nullable()->default(null);
            //tạo liên kết khoá ngoại với bảng users
            $table->foreign('winner_id')->references('id')->on('users')->onDelete('set null');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //huỷ liên kết khoá ngoại
            $table->dropForeign(['winner_id']);
            //huỷ cột
            $table->dropColumn(['reserve_price', 'start_price', 'status', 'winner_id']);

        });
    }
};
