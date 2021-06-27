<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHiresTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hires', function (Blueprint $table) {
            //
            $table->string('hirer_behalf')->nullable(true)->after('hirer_position');
            $table->string('tcl_behalf')->nullable(true)->after('tcl_position');

            $table->string('hirer_name')->nullable(true)->change();
            $table->string('hirer_position')->nullable(true)->change();
            $table->string('hirer_signature')->nullable(true)->change();
            $table->dateTime('hirer_sign_date')->nullable(true)->change();
            $table->string('tcl_name')->nullable(true)->change();
            $table->string('tcl_position')->nullable(true)->change();
            $table->string('tcl_signature')->nullable(true)->change();
            $table->dateTime('tcl_sign_date')->nullable(true)->change();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('hires', function (Blueprint $table) {

            $table->string('hirer_behalf')->dropColumn();
            $table->string('tcl_behalf')->dropColumn();

            $table->string('hirer_name')->change();
            $table->string('hirer_position')->change();
            $table->string('hirer_signature')->change();
            $table->dateTime('hirer_sign_date')->change();
            $table->string('tcl_name')->change();
            $table->string('tcl_position')->change();
            $table->string('tcl_signature')->change();
            $table->dateTime('tcl_sign_date')->change();
        });
    }
}
