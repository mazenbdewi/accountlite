<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretaeCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('customerFirstName');
            $table->string('customerMiddleName');
            $table->string('customerLastName');
            $table->string('customerMobile');
            $table->string('customerPhoneJob');
            $table->string('customerPhoneHome');
            $table->string('customerAddress');
            $table->string('customerCity');
            $table->string('customerNational');
            $table->double('customerDebt');
            $table->double('limit');
            $table->date('customerPaymentDate');
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
        Schema::drop('customers');
    }
}
