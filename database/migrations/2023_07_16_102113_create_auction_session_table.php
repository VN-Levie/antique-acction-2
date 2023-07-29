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
        Schema::create('auction_session', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');
            $table->text('description');
            $table->unsignedBigInteger('edit_history')->nullable();
            $table->time('end_at');
            $table->unsignedBigInteger('ended_by')->nullable();
            $table->text('goal');
            $table->unsignedBigInteger('interrupt_by')->nullable();
            $table->unsignedBigInteger('level');
            $table->text('name');
            $table->integer('num_completed')->default(0);
            $table->integer('num_lots')->default(0);
            $table->integer('num_skipped')->default(0);
            $table->text('payment_and_shipping')->nullable();
            $table->unsignedBigInteger('publish_by')->nullable();
            $table->time('start_at')->nullable();
            $table->unsignedBigInteger('started_by')->nullable();
            $table->unsignedBigInteger('terms_and_disclaimer')->nullable();
            $table->timestamps();
        });
        //tạo 1 auction_session
        $faker = Faker\Factory::create();
        $auction_sessions = [];
        for ($i = 0; $i < 1; $i++) {
            $auction_sessions[] = [
                'created_by' => 1,
                'description' => $faker->text(200),
                'end_at' => $faker->time(),
                'goal' => $faker->text(200),
                'interrupt_by' => 1,
                'level' => 1,
                'name' => $faker->name,
                'num_completed' => 1,
                'num_lots' => 1,
                'num_skipped' => 1,
                'payment_and_shipping' => $faker->text(200),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ];
        }
        DB::table('auction_session')->insert($auction_sessions);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction_session');
    }
};
