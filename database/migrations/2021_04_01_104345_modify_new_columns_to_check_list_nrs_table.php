<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyNewColumnsToCheckListNrsTable extends Migration
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
            Schema::table('check_list_nrs', function($table) {
                $table->string('status')->nullable(true)->change();

                $table->string('ext_splat_right')->nullable(true)->change();
                $table->string('ext_splat_left')->nullable(true)->change();
                $table->string('ext_splat_rear')->nullable(true)->change();
                $table->string('ext_splat_front')->nullable(true)->change();
                $table->string('int_splat')->nullable(true)->change();
                $table->string('int_video')->nullable(true)->change();
                $table->string('ext_video')->nullable(true)->change();

                $table->string('hirer_name')->nullable(true)->change();
                $table->string('hirer_position')->nullable(true)->change();
                $table->string('hirer_signature')->nullable(true)->change();
                $table->dateTime('hirer_sign_date')->nullable(true)->change();
                $table->string('tcl_name')->nullable(true)->change();
                $table->string('tcl_position')->nullable(true)->change();
                $table->string('tcl_signature')->nullable(true)->change();
                $table->dateTime('tcl_sign_date')->nullable(true)->change();
                $table->unsignedBigInteger('hire_id')->nullable(true)->change();
            });
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
            $table->string('status')->nullable(false)->change();
            $table->string('ext_splat_right')->change();
            $table->string('ext_splat_left')->change();
            $table->string('ext_splat_rear')->change();
            $table->string('ext_splat_front')->change();
            $table->string('int_splat')->change();
            $table->string('int_video')->change();
            $table->string('ext_video')->change();

            $table->string('hirer_name')->change();
            $table->string('hirer_position')->change();
            $table->string('hirer_signature')->change();
            $table->dateTime('hirer_sign_date')->change();
            $table->string('tcl_name')->change();
            $table->string('tcl_position')->change();
            $table->string('tcl_signature')->change();
            $table->dateTime('tcl_sign_date')->change();
            $table->unsignedBigInteger('hire_id')->change();
        });
    }
}
