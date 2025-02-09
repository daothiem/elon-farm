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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('customer_name', 255)->nullable()->default('');
            $table->string('customer_address_mail', 255)->nullable()->default('');
            $table->string('customer_number_phone', 255)->nullable()->default('');
            $table->string('special_request', 500)->nullable()->default('');
            $table->integer('type')->nullable()->default(1)->comment('1: full-day 0: half-day ');
            $table->integer('adults')->default(1)->comment('quantity adults');
            $table->integer('youth')->default(0)->comment('quantity youth');
            $table->integer('children')->default(0)->comment('quantity children');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
