<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_value');
            $table->integer('arrival');
            $table->integer('amount_sale');
            $table->date('date');

            //Key foreign
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('point_id')->unsigned();
            $table->foreign('point_id')->references('id')->on('points');

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
        Schema::dropIfExists('point_product');
    }
}
