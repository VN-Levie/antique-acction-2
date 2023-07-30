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
            //after category_id
            $table->text('thumbnail')->after('category_id');
        });
        //duyệt qua bảng auction_session và tạo thumbnail cho các session
        $session = DB::table('auction_session')->get();
        $faker = Faker\Factory::create();
        foreach ($session as $item) {
            $img_url = $faker->imageUrl($width = 640, $height = 480);
            DB::table('auction_session')->where('id', $item->id)->update(['thumbnail' => $img_url]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auction_sessio', function (Blueprint $table) {
            //huỷ cột thumbnail
            $table->dropColumn('thumbnail');
        });
    }
};
