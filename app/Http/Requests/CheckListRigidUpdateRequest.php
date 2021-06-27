<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckListRigidUpdateRequest extends FormRequest
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
            'paintwork' => ['nullable'],
            'cab_seat' => ['nullable'],
            'glass_mirrors' => ['nullable'],
            'valves_controls' => ['nullable'],
            'rear_bumper' => ['nullable'],
            'wings_stays' => ['nullable'],
            'lights' => ['nullable'],
            'vaccum_pump' => ['nullable'],
            'levels' => ['nullable'],
            'camera_operation' => ['nullable'],
            'cab_inside_out' => ['nullable'],
            'side_guards' => ['nullable'],
            'book_pack' => ['nullable'],
            
            
            'last_known_product' => ['nullable', 'max:255', 'string'],
            'mileage' => ['nullable', 'max:255', 'string'],
            'vessel_condition' => [
                'required',
                'in:Good,Average,Poor,Unserviceable',
            ],
            'fuel_level' => [
                'required',
                'in:Empty,1/4,1/2,3/4,Full',
            ],
            'notes' => ['nullable', 'max:255', 'string'],

            /// Video walk around fields
            'int_video' => ['nullable', 'max:255', 'string'],
            'ext_video' => ['nullable', 'max:255', 'string'],                  
            
            //Tyres check fields
            'tyres_1_1' => ['nullable', 'max:255', 'string'],
            'tyres_1_2' => ['nullable', 'max:255', 'string'],
            'tyres_1_3' => ['nullable', 'max:255', 'string'],
            'tyres_1_4' => ['nullable', 'max:255', 'string'],
            'tyres_2_1' => ['nullable', 'max:255', 'string'],
            'tyres_2_2' => ['nullable', 'max:255', 'string'],
            'tyres_2_3' => ['nullable', 'max:255', 'string'],
            'tyres_3_1' => ['nullable', 'max:255', 'string'],
            'tyres_3_2' => ['nullable', 'max:255', 'string'],
            'tyres_3_3' => ['nullable', 'max:255', 'string'],
            'tyres_4_1' => ['nullable', 'max:255', 'string'],
            'tyres_4_2' => ['nullable', 'max:255', 'string'],
            'tyres_4_3' => ['nullable', 'max:255', 'string'],
            'tyres_4_4' => ['nullable', 'max:255', 'string'],
            
            //Tanker Inspection fields
            'int_splat' => ['nullable', 'max:255', 'string'],
            'ext_splat_right' => ['nullable', 'max:255', 'string'],
            'ext_splat_left' => ['nullable', 'max:255', 'string'],
            'ext_splat_rear' => ['nullable', 'max:255', 'string'],
            'ext_splat_front' => ['nullable', 'max:255', 'string'],

            // Extra fields for signature
            'hirer_behalf' => ['required', 'max:255', 'string'],
            'tcl_behalf' => ['required', 'max:255', 'string'],

            
            'checklist_type' => ['required', 'in:On,Off'],
            'hirer_name' => ['required', 'max:255', 'string'],
            'hirer_position' => ['required', 'max:255', 'string'],
            'hirer_signature' => ['required', 'max:255', 'string'],
            'hirer_sign_date' => ['required', 'date', 'date'],
            'tcl_name' => ['required', 'max:255', 'string'],
            'tcl_position' => ['required', 'max:255', 'string'],
            'tcl_signature' => ['nullable', 'max:255', 'string'],
            'tcl_sign_date' => ['nullable', 'date', 'date'],
            'link' => ['nullable', 'date', 'date'],
        ];
    }
}
