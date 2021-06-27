<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToCheckListNrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_nrs', function (Blueprint $table) {
            $table
                ->foreign('hire_id')
                ->references('id')
                ->on('hires');
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
            $table->dropForeign(['hire_id']);
        });
    }
}
