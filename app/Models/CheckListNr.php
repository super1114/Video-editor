<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckListNr extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'checklist_type',
        'status',
        'uuid',
        'cladding_panels',
        'handrail_ladder',
        'compartment_internal',
        'side_guards',
        'rear_bumper',
        'wings_stays',
        'lights',
        'engine',
        'vacuum_pump',
        'dipstrick',
        'valve_operation',
        'fire_extinguisher',
        'chassis',
        'vehicle_check_note',
        'note_1',
        'ns_1',
        'os_1',
        'note_2',
        'ns_2',
        'os_2',
        'note_3',
        'ns_3',
        'os_3',
        'ext_splat_right',
        'ext_splat_left',
        'ext_splat_rear',
        'ext_splat_front',
        'int_splat',
        'int_video',                
        'ext_video',
        'cleaning_status',
        'hirer_name',
        'hirer_position',
        'hirer_signature',
        'hirer_behalf',
        'hirer_sign_date',
        'tcl_name',
        'tcl_position',
        'tcl_signature',
        'tcl_behalf',
        'tcl_sign_date',
        'hire_id',
        'link',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'check_list_nrs';

    protected $casts = [
        'cladding_panels' => 'boolean',
        'handrail_ladder' => 'boolean',
        'compartment_internal' => 'boolean',
        'side_guards' => 'boolean',
        'rear_bumper' => 'boolean',
        'wings_stays' => 'boolean',
        'lights' => 'boolean',
        'engine' => 'boolean',
        'vacuum_pump' => 'boolean',
        'dipstrick' => 'boolean',
        'valve_operation' => 'boolean',
        'fire_extinguisher' => 'boolean',
        'chassis' => 'boolean',
        'hirer_sign_date' => 'datetime',
        'tcl_sign_date' => 'datetime',
    ];

    public function hire()
    {
        return $this->belongsTo(Hire::class);
    }
}
