<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_registrations', function (Blueprint $table) {
            $table->increments('seller_id');
            $table->string('seller_name');
            $table->string('seller_email');
            $table->text('seller_phone');
            $table->string('district');
            $table->string('policestation');
            $table->string('shop_name');
            $table->text('message');
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
        Schema::dropIfExists('tbl_registrations');
    }
}
