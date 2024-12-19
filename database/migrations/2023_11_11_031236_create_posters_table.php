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
        Schema::create('posters', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('image', 500)->nullable();
            $table->string('description', 500)->nullable();
            $table->text('content')->nullable();
            $table->integer('ordering')->nullable();
            $table->boolean('is_show')->default(true)->nullable();
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
        Schema::dropIfExists('posters');
    }
};
