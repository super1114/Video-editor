<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTankersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tankers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_num');
            $table->string('make');
            $table->string('equipment');
            $table->decimal('replacement_value');
            $table->date('mot_expiry');
            $table->date('adr_expiry');
            $table->string('chassis_num');
            $table->boolean('discharge_pump')->default(0);
            $table->string('service_interval');
            $table->string('serial_num');
            $table->string('tank_type');
            $table->string('sector');

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
        Schema::dropIfExists('tankers');
    }
}
