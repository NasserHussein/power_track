<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|max:255',
            'name_manager' => 'max:255',
            'phone_no' => 'numeric|nullable',
            'email' => 'email|max:255|nullable',
            'company_address' => 'max:700',
            'date_of_contract' => 'max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'email' => 'هذا الحقل يجب ان يكون E-Mail',
            'max' => 'لا يجب ان تتخطي 255 حرف',
            'numeric' => 'هذا الحقل يجب ان يكون أرقام',
            'company_address.max' => 'هذا الحقل لايجب ان يتخطي 700 حرف'
        ];
    }
}
