<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckListRigidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_list_rigids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('checklist_type', ['On', 'Off']);
            $table->string('status_string');
            $table->string('hirer_name');
            $table->string('hirer_position');
            $table->string('hirer_signature');
            $table->dateTime('hirer_sign_date');
            $table->string('tcl_name');
            $table->string('tcl_position');
            $table->string('tcl_signature');
            $table->dateTime('tcl_sign_date');
            $table->unsignedBigInteger('hire_id');
            $table->string('link')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_list_rigids');
    }
}
