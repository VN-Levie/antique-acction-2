<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * content TEXT(255),
     *created_by INT,
     *id INT PRIMARY KEY AUTO_INCREMENT,
     *last_edited_by INT,
     *session_name TEXT(255)
     */
    public function up(): void
    {
        Schema::create('terms_and_disclaimer', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_edited_by');
            $table->unsignedBigInteger('session_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms_and_disclaimer');
    }
};
