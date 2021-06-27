<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToHiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hires', function (Blueprint $table) {
            $table
                ->foreign('company_id')
                ->references('id')
                ->on('companies');
            $table
                ->foreign('tanker_id')
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
        Schema::table('hires', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['tanker_id']);
        });
    }
}
