<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl__vouchers', function (Blueprint $table) {
            $table->increments('voucher_id');
            $table->integer('product_id');
            
            $table->integer('seller_id');
            
            $table->integer('supplier_id');
           ;
            $table->integer('stock_id');
            $table->integer('sale_qty');
            $table->float('total');
            $table->float('vat');
            
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
        Schema::dropIfExists('tbl__vouchers');
    }
}
