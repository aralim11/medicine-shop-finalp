<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('purchase', function (Blueprint $table) {
            $table->increments('purchase_id');
            $table->integer('product_id');
            $table->float('total_purchase_price');
            $table->float('total_advance_price');
            $table->float('total_due_price');
            $table->integer('product_qty');
            $table->integer('supplier_id');
            $table->integer('seller_id');
            $table->integer('paymet_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('purchase');
    }

}
