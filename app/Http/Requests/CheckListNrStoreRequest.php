<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckListNrStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'checklist_type' => ['required', 'in:On,Off'],
            // 'status' => ['required', 'max:255', 'string'],

            'cladding_panels' => ['nullable'],
            'handrail_ladder' => ['nullable'],
            'compartment_internal' => ['nullable'],
            'side_guards' => ['nullable'],
            'rear_bumper' => ['nullable'],
            'wings_stays' => ['nullable'],
            'lights' => ['nullable'],
            'engine' => ['nullable'],
            'vacuum_pump' => ['nullable'],
            'dipstrick' => ['nullable'],
            'valve_operation' => ['nullable'],
            'fire_extinguisher' => ['nullable'],
            'chassis' => ['nullable'],
            'vehicle_check_note' => ['nullable'],

            'note_1' => ['nullable', 'max:255', 'string'],
            'ns_1' => ['nullable', 'max:255'],
            'os_1' => ['nullable', 'max:255'],
            'note_2' => ['nullable', 'max:255', 'string'],
            'ns_2' => ['nullable', 'max:255'],
            'os_2' => ['nullable', 'max:255'],
            'note_3' => ['nullable', 'max:255', 'string'],
            'ns_3' => ['nullable', 'max:255'],
            'os_3' => ['nullable', 'max:255'],

            'ext_splat_right' => ['nullable', 'max:255', 'string'],
            'ext_splat_left' => ['nullable', 'max:255', 'string'],
            'ext_splat_rear' => ['nullable', 'max:255', 'string'],
            'ext_splat_front' => ['nullable', 'max:255', 'string'],
            'int_splat' => ['nullable', 'max:255', 'string'],
            'int_video' => ['nullable', 'max:255', 'string'],
            'ext_video' => ['nullable', 'max:255', 'string'],            

            'hirer_name' => ['nullable', 'max:255', 'string'],
            'hirer_position' => ['nullable', 'max:255', 'string'],
            'hirer_signature' => ['nullable', 'max:255', 'string'],
            'hirer_behalf' => ['nullable', 'max:255', 'string'],
            'hirer_sign_date' => ['nullable', 'date', 'date'],

            'tcl_name' => ['required', 'max:255', 'string'],
            'tcl_position' => ['required', 'max:255', 'string'],
            'tcl_signature' => ['nullable', 'max:255', 'string'],
            'tcl_behalf' => ['required', 'max:255', 'string'],
            'tcl_sign_date' => ['required', 'date', 'date'],            
        ];
    }
}
