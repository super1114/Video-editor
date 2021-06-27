<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBehalfsToCheckListNrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_nrs', function (Blueprint $table) {
            $table->string('hirer_behalf')->nullable(true);
            $table->string('tcl_behalf')->nullable(true);
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_list_nrs', function (Blueprint $table) {
            $table->string('hirer_behalf')->dropColumn();
            $table->string('tcl_behalf')->dropColumn();
            //
        });
    }
}
