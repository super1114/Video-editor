<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCleaningStatusToCheckListNrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_nrs', function (Blueprint $table) {
            $table->string('cleaning_status')->after('ext_video')->nullable(true);
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
            $table->dropColumn('cleaning_status');
        });
    }
}
