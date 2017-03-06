<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('orderType');
            $table->date('orderDate');
            $table->string('orderPaymentType');
            $table->string('orderBankName')->ablenull();;
            $table->string('orderCheckNO')->ablenull();;
            $table->Date('orderDueDate');
            $table->integer('employee_id');
            $table->integer('customer_id')->ablenull();
            $table->integer('provider_id')->ablenull();
            $table->double('getMoney');
            $table->double('backMoney')->ablenull();
            $table->double('orderPayment');
            $table->string('orderNote')->ablenull();
            
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
        Schema::drop('orders');
    }
}
