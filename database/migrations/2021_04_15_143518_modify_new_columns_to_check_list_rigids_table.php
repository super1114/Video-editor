<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyNewColumnsToCheckListRigidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_rigids', function (Blueprint $table) {

            /// Vehicle check database fields
            $table->dropColumn('status_string');
            $table->string('status')->nullable(true);

            $table->boolean('paintwork')->default(false);
            $table->boolean('cab_seat')->default(false);
            $table->boolean('glass_mirrors')->default(false);
            $table->boolean('valves_controls')->default(false);
            $table->boolean('rear_bumper')->default(false);
            $table->boolean('wings_stays')->default(false);
            $table->boolean('lights')->default(false);
            $table->boolean('vaccum_pump')->default(false);
            $table->boolean('levels')->default(false);
            $table->boolean('camera_operation')->default(false);
            $table->boolean('cab_inside_out')->default(false);
            $table->boolean('side_guards')->default(false);
            $table->boolean('book_pack')->default(false);

            $table->string('last_known_product')->nullable(true);
            $table->string('mileage')->nullable(true);

            $table->enum('vessel_condition', ['Good', 'Average', 'Poor', 'Unserviceable'])->default('Good');
            $table->string('notes')->nullable(true);


            /// Video walk around fields
            $table->string('int_video')->nullable(true);
            $table->string('ext_video')->nullable(true);
            
            //Tyres check fields
            $table->string('tyres_1_1')->nullable(true);
            $table->string('tyres_1_2')->nullable(true);
            $table->string('tyres_1_3')->nullable(true);
            $table->string('tyres_1_4')->nullable(true);
            $table->string('tyres_2_1')->nullable(true);
            $table->string('tyres_2_2')->nullable(true);
            $table->string('tyres_2_3')->nullable(true);
            $table->string('tyres_3_1')->nullable(true);
            $table->string('tyres_3_2')->nullable(true);
            $table->string('tyres_3_3')->nullable(true);
            $table->string('tyres_4_1')->nullable(true);
            $table->string('tyres_4_2')->nullable(true);
            $table->string('tyres_4_3')->nullable(true);
            $table->string('tyres_4_4')->nullable(true);
            
            //Tanker Inspection fields
            $table->string('int_splat')->nullable(true);
            $table->string('ext_splat_right')->nullable(true);
            $table->string('ext_splat_left')->nullable(true);
            $table->string('ext_splat_rear')->nullable(true);
            $table->string('ext_splat_front')->nullable(true);

            // Extra fields for signature
            $table->string('hirer_behalf')->nullable(true);
            $table->string('tcl_behalf')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_list_rigids', function (Blueprint $table) {
            $table->string('status_string');

            $table->dropColumn('status');
            $table->dropColumn('paintwork');
            $table->dropColumn('cab_seat');
            $table->dropColumn('glass_mirrors');
            $table->dropColumn('valves_controls');
            $table->dropColumn('rear_bumper');
            $table->dropColumn('wings_stays');
            $table->dropColumn('lights');
            $table->dropColumn('vaccum_pump');
            $table->dropColumn('levels');
            $table->dropColumn('camera_operation');
            $table->dropColumn('cab_inside_out');
            $table->dropColumn('side_guards');
            $table->dropColumn('book_pack');

            $table->dropColumn('last_known_product');
            $table->dropColumn('mileage');
            $table->dropColumn('checklist_type', ['Good', 'Average', 'Poor', 'Unserviceable'])->defau;
            $table->dropColumn('notes');


            /// Video walk around fields
            $table->dropColumn('int_video');
            $table->dropColumn('ext_video');
            
            //Tyres check fields
            $table->dropColumn('tyres_1_1');
            $table->dropColumn('tyres_1_2');
            $table->dropColumn('tyres_1_3');
            $table->dropColumn('tyres_1_4');
            $table->dropColumn('tyres_2_1');
            $table->dropColumn('tyres_2_2');
            $table->dropColumn('tyres_2_3');
            $table->dropColumn('tyres_3_1');
            $table->dropColumn('tyres_3_2');
            $table->dropColumn('tyres_3_3');
            $table->dropColumn('tyres_4_1');
            $table->dropColumn('tyres_4_2');
            $table->dropColumn('tyres_4_3');
            $table->dropColumn('tyres_4_4');
            
            //Tanker Inspection fields
            $table->dropColumn('int_splat');
            $table->dropColumn('ext_splat_right');
            $table->dropColumn('ext_splat_left');
            $table->dropColumn('ext_splat_rear');
            $table->dropColumn('ext_splat_front');

            // Extra fields for signature
            $table->dropColumn('hirer_behalf');
            $table->dropColumn('tcl_behalf');
        });
    }
}
