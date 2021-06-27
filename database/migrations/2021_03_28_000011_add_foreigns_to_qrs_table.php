<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToQrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qrs', function (Blueprint $table) {
            $table
                ->foreign('tankers_id')
                ->references('id')
                ->on('tankers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qrs', function (Blueprint $table) {
            $table->dropForeign(['tankers_id']);
        });
    }
}
