<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->timestamps();
        });
        //tạo 4 role mặc định: user, editor, appraiser, admin
        DB::table('roles')->insert([
            ['name' => 'user', 'display_name' => 'Người dùng'],
            ['name' => 'editor', 'display_name' => 'Biên tập viên'],
            ['name' => 'appraiser', 'display_name' => 'Chuyên gia'],
            ['name' => 'admin', 'display_name' => 'Quản trị viên'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
