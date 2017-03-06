<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('employeeFirstName');
            $table->string('employeeMiddleName');
            $table->string('employeeLastName');
            $table->date('employeeBrithday');
            $table->string('employeeAddress');
            $table->string('employeeMobile');
            $table->string('employeePhoneHome');
            $table->string('employeePhoneJob');
            $table->string('employeeCity');
            $table->string('employeeNational');
            $table->decimal('employeeSalary');
            $table->decimal('employeeDiscount');
            $table->date('employeeFrom');
            $table->date('employeeTo');
            $table->integer('career_id');
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
        Schema::drop('employees');
    }
}
