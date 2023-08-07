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
            ['name' => 'user', 'display_name' => 'User'],
            ['name' => 'editor', 'display_name' => 'Editor'],
            ['name' => 'appraiser', 'display_name' => 'Appraiser'],
            ['name' => 'seller', 'display_name' => 'Seller'],
            ['name' => 'admin', 'display_name' => 'Admin'],
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
