<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HireSigningRequest extends FormRequest
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
            'hirer_name' => ['nullable', 'max:255', 'string'],
            'hirer_position' => ['nullable', 'max:255', 'string'],
            'hirer_behalf' => ['nullable', 'max:255', 'string'],
            'hirer_signature' => ['nullable', 'max:255', 'string'],
            'hirer_sign_date' => ['nullable', 'date', 'date'],
            'hirer_ip' => ['required', 'max:255', 'string'],
            'hirer_geo' => ['required', 'max:255', 'string'],
        ];
    }
}
