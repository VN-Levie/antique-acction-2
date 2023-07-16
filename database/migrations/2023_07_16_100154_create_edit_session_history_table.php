<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *  approve_by INT,
     *id INT PRIMARY KEY AUTO_INCREMENT,
     *session_id INT,
     *staff_id INT,
     *time_edited TIME
     */
    public function up(): void
    {
        Schema::create('edit_session_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('approve_by');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('staff_id');
            $table->time('time_edited');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edit_session_history');
    }
};
