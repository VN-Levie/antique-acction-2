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
            //tạo cột role trong bảng users. mặc định là 1 (user) thêm sau trường email
            $table->unsignedBigInteger('role')->default(1)->nullable()->after('email');
            //tạo khoá ngoại role liên kết với khoá chính id của bảng roles.
            //Khi  xóa bản ghi trong bảng roles thì sẽ cập nhật lại bản ghi trong bảng users về role = 1 (user)
            $table->foreign('role')->references('id')->on('roles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // huỷ khoá ngoại
            $table->dropForeign(['role']);
            // xóa cột role
            $table->dropColumn('role');
        });
    }
};
