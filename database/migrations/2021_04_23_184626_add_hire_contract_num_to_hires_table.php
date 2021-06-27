<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHireContractNumToHiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hires', function (Blueprint $table) {
            $table->string('contract_num')->nullable(true)->after('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hires', function (Blueprint $table) {
            $table->dropColumn('contract_num');
        });
    }
}
