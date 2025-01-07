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
        Schema::table('preview_tours', function (Blueprint $table) {
            $table->string('first_name', 255)->nullable();
            $table->string('host_name', 255)->nullable();
            $table->string('localized_date', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preview_tours', function (Blueprint $table) {
            //
        });
    }
};
