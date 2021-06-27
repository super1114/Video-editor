<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFuelLevelToChecklistRigidsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_rigids', function (Blueprint $table) {
            $table->enum('fuel_level', ['Empty', '1/4', '1/2', '3/4', 'Full'])->default('Empty')->after('vessel_condition');
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
            $table->dropColumn('fuel_level');
        });
    }
}
