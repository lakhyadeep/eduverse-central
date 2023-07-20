<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'client_name' => 'required',
            'client_type_id' => 'required',
            'email' => 'required|email|unique:clients',
            'primary_contact_name' => 'required',
            'primary_contact_number' => 'required|unique:clients',
            'address_line_1' => 'required',
        ];
    }


    /**
     * Custom message for validation
     *
     * @return array
     */

    public function messages()
    {
        return [
            'primary_contact_name.required' => 'The name field is required.',
            'primary_contact_number.required' => 'The contact number field is required.',
            'client_type_id.required' => 'The client type field is required.',
        ];
    }
}
