<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('tanker_id');
            $table->string('uuid')->unique();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->enum('hire_type', [
                'Daily',
                'Weekly',
                'Monthly',
                '3 Months +',
                '6 Months +',
                '12 Months +',
            ]);
            $table->decimal('hire_rate');
            $table->decimal('deposit')->nullable();
            $table->string('minimum_hire_period')->nullable();
            $table->string('notice_period')->nullable();
            $table->boolean('maintenance_included')->default(0);
            $table->boolean('tyres_included')->default(0);
            $table->decimal('delivery_charge')->nullable();
            $table->decimal('collection_charge')->nullable();
            $table->decimal('water_fill_charge')->nullable();
            $table->decimal('tyre_wear_charge')->nullable();
            $table->decimal('commissioning_charge')->nullable();
            $table->decimal('cleaning_outside_charge')->nullable();
            $table->decimal('cleanout_charge')->nullable();
            $table->decimal('other_charge')->nullable();
            $table->string('charge_notes')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_postcode')->nullable();
            $table->string('delivery_phone')->nullable();
            $table->string('delivery_email')->nullable();
            $table->string('delivery_fax')->nullable();
            $table->string('delivery_contact_name')->nullable();
            $table->string('insurer');
            $table->string('policy_num');
            $table->string('broker')->nullable();
            $table->string('policy_type');
            $table->date('policy_expiry');
            $table->decimal('policy_value');
            $table->string('policy_notes')->nullable();
            $table->string('hirer_name');
            $table->string('hirer_position');
            $table->string('hirer_signature');
            $table->date('hirer_sign_date');
            $table->string('hirer_ip');
            $table->string('hirer_geo');
            $table->string('tcl_name');
            $table->string('tcl_position');
            $table->string('tcl_signature');
            $table->date('tcl_sign_date');
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
        Schema::dropIfExists('hires');
    }
}
