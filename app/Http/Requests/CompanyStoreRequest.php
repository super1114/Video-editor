<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            'mobile' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email', 'unique:companies'],
            'company' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'postcode' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'contact' => ['required', 'max:255', 'string'],
        ];
    }
}
