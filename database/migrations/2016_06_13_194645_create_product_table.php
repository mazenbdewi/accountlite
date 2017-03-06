<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('productCode');
            $table->string('productName');
            $table->text('productDescription');
            $table->double('productNetPrice');
            $table->integer('productQuntity');
            $table->string('productUnit');
            $table->double('productSellPrice');
            $table->double('productTotalPrice');
            $table->integer('category_id');
            $table->integer('order_id');
            

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
        Schema::drop('products');
    }
}
