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
        Schema::table('auction_session', function (Blueprint $table) {
            //after description
            $table->unsignedBigInteger('category_id')->nullable()->after('description');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
        //duyệt qua bảng auction_session và gán category_id nhiên 1-10 cho các session
        $session = DB::table('auction_session')->get();
        foreach ($session as $item) {
            DB::table('auction_session')->where('id', $item->id)->update(['category_id' => rand(1, 10)]);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auction_session', function (Blueprint $table) {
            //huỷ khóa ngoại
            $table->dropForeign(['category_id']);
            //huỷ cột category_id
            $table->dropColumn('category_id');
        });
    }
};
