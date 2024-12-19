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
        Schema::create('product_colors', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->default(0);
            $table->string('name', 255)->default('');
            $table->double('price')->default(0);
            $table->double('price_discount')->default(0);
            $table->string('image', 500)->default('');
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
        Schema::dropIfExists('product_colors');
    }
};
