<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number', 255)->nullable()->default('');
            $table->string('map', 1000)->nullable()->default('');
            $table->string('working_time', 500)->nullable()->default('');
            $table->string('address', 500)->nullable()->default('');
            $table->string('logo_pc', 500)->nullable()->default('');
            $table->string('logo_mobile', 500)->nullable()->default('');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('about_us')->truncate();
        \Illuminate\Support\Facades\DB::table('about_us')->insert([
            'id' => 1,
            'phone_number' => null,
            'map' => null,
            'working_time' => null,
            'address' => null,
            'logo_pc' => null,
            'logo_mobile' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us');
    }
};
