<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretaeProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('providerFirstName');
            $table->string('providerMiddleName');
            $table->string('providerLastName');
            $table->string('providerCompany');
            $table->string('providerMobile');
            $table->string('providerPhoneJob');
            $table->string('providerPhoneHome');
            $table->string('providerAddress');
            $table->string('providerCity');
            $table->string('providerNational');
            $table->string('providerCreditor');
            $table->date('providerPaymentDate');

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
        Schema::drop('providers');
    }
}
