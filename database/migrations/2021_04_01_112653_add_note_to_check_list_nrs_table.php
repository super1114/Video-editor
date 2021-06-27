<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoteToCheckListNrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_nrs', function (Blueprint $table) {
            //
            $table->string('vehicle_check_note')->nullable(true);
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
            //
            $table->dropColumn('vehicle_check_note');
        });
    }
}
