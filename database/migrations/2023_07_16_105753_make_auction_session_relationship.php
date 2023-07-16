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
        Schema::table('auction_session', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('edit_history')->references('id')->on('edit_session_history');
            $table->foreign('ended_by')->references('id')->on('users');
            $table->foreign('interrupt_by')->references('id')->on('users');
            $table->foreign('publish_by')->references('id')->on('users');
            $table->foreign('started_by')->references('id')->on('users');
            $table->foreign('terms_and_disclaimer')->references('id')->on('terms_and_disclaimer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auction_session', function (Blueprint $table) {
            // huỷ khóa ngoại
            $table->dropForeign(['created_by']);
            $table->dropForeign(['edit_history']);
            $table->dropForeign(['ended_by']);
            $table->dropForeign(['interrupt_by']);
            $table->dropForeign(['publish_by']);
            $table->dropForeign(['started_by']);
            $table->dropForeign(['terms_and_disclaimer']);
        });
    }
};
