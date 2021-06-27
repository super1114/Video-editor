<?php

namespace App\Http\Controllers\Api;

use App\Models\Tanker;
use Illuminate\Http\Request;
use App\Http\Resources\HireResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\HireCollection;

class TankerHiresController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tanker $tanker
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Tanker $tanker)
    {
        $this->authorize('view', $tanker);

        $search = $request->get('search', '');

        $hires = $tanker
            ->hires()
            ->search($search)
            ->latest()
            ->paginate();

        return new HireCollection($hires);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tanker $tanker
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tanker $tanker)
    {
        $this->authorize('create', Hire::class);

        $validated = $request->validate([
            'company_id' => ['required', 'exists:companies,id'],
            'start_date' => ['required', 'date', 'date'],
            'end_date' => ['nullable', 'date', 'date'],
            'delivery_date' => ['nullable', 'date', 'date'],
            'hire_type' => [
                'required',
                'in:daily,weekly,monthly,3 months +,6 months +,12 months +',
            ],
            'hire_rate' => ['required', 'numeric'],
            'deposit' => ['nullable', 'numeric'],
            'minimum_hire_period' => ['nullable', 'max:255', 'string'],
            'notice_period' => ['nullable', 'max:255', 'string'],
            'maintenance_included' => ['required', 'boolean', 'boolean'],
            'tyres_included' => ['required', 'boolean', 'boolean'],
            'delivery_charge' => ['nullable', 'numeric'],
            'collection_charge' => ['nullable', 'numeric'],
            'water_fill_charge' => ['nullable', 'numeric'],
            'tyre_wear_charge' => ['nullable', 'numeric'],
            'commissioning_charge' => ['nullable', 'numeric'],
            'cleaning_outside_charge' => ['nullable', 'numeric'],
            'cleanout_charge' => ['nullable', 'numeric'],
            'other_charge' => ['nullable', 'numeric'],
            'charge_notes' => ['nullable', 'max:255', 'string'],
            'delivery_address' => ['nullable', 'max:255', 'string'],
            'delivery_postcode' => ['nullable', 'max:255', 'string'],
            'delivery_phone' => ['nullable', 'max:255', 'string'],
            'delivery_email' => ['nullable', 'max:255', 'string'],
            'delivery_fax' => ['nullable', 'max:255', 'string'],
            'delivery_contact_name' => ['nullable', 'max:255', 'string'],
            'insurer' => ['required', 'max:255', 'string'],
            'policy_num' => ['required', 'max:255', 'string'],
            'broker' => ['nullable', 'max:255', 'string'],
            'policy_type' => ['required', 'max:255', 'string'],
            'policy_expiry' => ['required', 'date', 'date'],
            'policy_value' => ['required', 'numeric'],
            'policy_notes' => ['nullable', 'max:255', 'string'],
            'hirer_name' => ['required', 'max:255', 'string'],
            'hirer_position' => ['required', 'max:255', 'string'],
            'hirer_signature' => ['required', 'max:255', 'string'],
            'hirer_sign_date' => ['required', 'date', 'date'],
            'hirer_ip' => ['required', 'max:255', 'string'],
            'hirer_geo' => ['required', 'max:255', 'string'],
            'tcl_name' => ['required', 'max:255', 'string'],
            'tcl_position' => ['required', 'max:255', 'string'],
            'tcl_signature' => ['required', 'max:255', 'string'],
            'tcl_sign_date' => ['required', 'date', 'date'],
        ]);

        $hire = $tanker->hires()->create($validated);

        return new HireResource($hire);
    }
}
