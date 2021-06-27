<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hire extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'company_id',
        'tanker_id',
        'uuid',
        'order_num',
        'contract_num',
        'start_date',
        'end_date',
        'delivery_date',
        'hire_type',
        'hire_rate',
        'deposit',
        'minimum_hire_period',
        'notice_period',
        'maintenance_included',
        'tyres_included',
        'delivery_charge',
        'collection_charge',
        'water_fill_charge',
        'tyre_wear_charge',
        'commissioning_charge',
        'cleaning_outside_charge',
        'cleanout_charge',
        'other_charge',
        'charge_notes',
        'delivery_address',
        'delivery_postcode',
        'delivery_phone',
        'delivery_email',
        'delivery_fax',
        'delivery_contact_name',
        'insurer',
        'policy_num',
        'broker',
        'policy_type',
        'policy_expiry',
        'policy_value',
        'policy_notes',
        'hirer_name',
        'hirer_position',
        'hirer_behalf',
        'hirer_signature',
        'hirer_sign_date',
        'hirer_ip',
        'hirer_geo',
        'tcl_name',
        'tcl_position',
        'tcl_behalf',
        'tcl_signature',
        'tcl_sign_date',
        'link',
        'uuid',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'delivery_date' => 'date',
        'maintenance_included' => 'boolean',
        'tyres_included' => 'boolean',
        'policy_expiry' => 'date',
        'hirer_sign_date' => 'date',
        'tcl_sign_date' => 'date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tanker()
    {
        return $this->belongsTo(Tanker::class);
    }

    public function checkListsNRs()
    {
        return $this->hasMany(CheckListNr::class);
    }

    public function checkListRigids()
    {
        return $this->hasMany(CheckListRigid::class);
    }
}
