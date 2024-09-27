<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('seller_id');
            $table->string('seller_name');
            $table->string('shop_name');
            $table->string('seller_email')->unique();
            $table->string('seller_picture');
            $table->text('seller_address');
            $table->text('seller_phone');
            $table->string('seller_district');
            $table->string('seller_policeStation');
            $table->tinyInteger('seller_label');
            $table->string('password');
            $table->integer('district_id');
            $table->integer('pstation_id');
            $table->rememberToken();
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
        Schema::dropIfExists('sellers');
    }
}
