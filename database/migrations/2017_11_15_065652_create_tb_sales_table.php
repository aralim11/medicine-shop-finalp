<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sales', function (Blueprint $table) {
            
            $table->increments('salesid');
            $table->string('invoice_id');
            $table->string('product_name');
            $table->float('sale_price');
            $table->integer('quantity');
            $table->integer('seller_id');
            $table->float('vat');
            $table->float('total');
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
        Schema::dropIfExists('tb_sales');
    }
}
