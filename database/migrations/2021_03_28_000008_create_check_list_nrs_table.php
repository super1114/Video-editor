<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckListNrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_list_nrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('checklist_type', ['On', 'Off'])->default('On');
            $table->string('status');
            $table->boolean('cladding_panels')->default(0);
            $table->boolean('handrail_ladder');
            $table->boolean('compartment_internal');
            $table->boolean('side_guards');
            $table->boolean('rear_bumper');
            $table->boolean('wings_stays');
            $table->boolean('lights');
            $table->boolean('engine');
            $table->boolean('vacuum_pump');
            $table->boolean('dipstrick');
            $table->boolean('valve_operation');
            $table->boolean('fire_extinguisher');
            $table->boolean('chassis');
            $table->string('note_1')->nullable();
            $table->smallInteger('ns_1')->nullable();
            $table->smallInteger('os_1')->nullable();
            $table->string('note_2')->nullable();
            $table->smallInteger('ns_2');
            $table->smallInteger('os_2')->nullable();
            $table->string('note_3')->nullable();
            $table->smallInteger('ns_3')->nullable();
            $table->smallInteger('os_3')->nullable();
            $table->string('ext_splat_right');
            $table->string('ext_splat_left');
            $table->string('ext_splat_rear');
            $table->string('ext_splat_front');
            $table->string('int_splat');
            $table->string('int_video');
            $table->string('ext_video');
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
        Schema::dropIfExists('check_list_nrs');
    }
}
