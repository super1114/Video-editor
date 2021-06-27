<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckListRigid extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'status',
        'uuid',

        'paintwork',
        'cab_seat',
        'glass_mirrors',
        'valves_controls',
        'rear_bumper',
        'wings_stays',
        'lights',
        'vaccum_pump',
        'levels',
        'camera_operation',
        'cab_inside_out',
        'side_guards',
        'book_pack',
        
        'last_known_product',
        'mileage',
        'vessel_condition',
        'fuel_level',
        'notes',

        /// Video walk around fields
        'int_video',
        'ext_video',
        
        //Cleaning Certificate
        'cleaning_status',

        //Tyres check fields
        'tyres_1_1',
        'tyres_1_2',
        'tyres_1_3',
        'tyres_1_4',
        'tyres_2_1',
        'tyres_2_2',
        'tyres_2_3',
        'tyres_3_1',
        'tyres_3_2',
        'tyres_3_3',
        'tyres_4_1',
        'tyres_4_2',
        'tyres_4_3',
        'tyres_4_4',
        
        //Tanker Inspection fields
        'int_splat',
        'ext_splat_right',
        'ext_splat_left',
        'ext_splat_rear',
        'ext_splat_front',

        // Extra fields for signature
        'hirer_behalf',
        'tcl_behalf',

        'checklist_type',
        'hirer_name',
        'hirer_position',
        'hirer_signature',
        'hirer_sign_date',
        'tcl_name',
        'tcl_position',
        'tcl_signature',
        'tcl_sign_date',
        'hire_id',
        'link',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'check_list_rigids';

    protected $casts = [
        'hirer_sign_date' => 'datetime',
        'tcl_sign_date' => 'datetime',
    ];

    public function hire()
    {
        return $this->belongsTo(Hire::class);
    }
}
