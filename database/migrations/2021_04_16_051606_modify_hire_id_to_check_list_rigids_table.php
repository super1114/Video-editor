<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyHireIdToCheckListRigidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_rigids', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('hire_id')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_list_rigids', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('hire_id')->nullable(false)->change();
        });
    }
}
