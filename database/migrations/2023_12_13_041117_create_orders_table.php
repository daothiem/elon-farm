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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 255)->nullable();
            $table->string('customer_phone', 255)->nullable();
            $table->string('province_code', 255)->nullable();
            $table->string('district_code', 255)->nullable();
            $table->string('ward_code', 255)->nullable();
            $table->string('other_address', 500)->nullable();
            $table->string('note', 500)->nullable();
            $table->integer('promotion_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
