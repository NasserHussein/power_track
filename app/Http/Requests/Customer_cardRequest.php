<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Customer_cardRequest extends FormRequest
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
            'name' => 'required|max:255',
            'card_no' => 'max:255',
            'serial_no' => 'required|max:255',
            'chassis_no' => 'max:255',
            'card_model' => 'max:255',
            'date_of_purchase' => 'date|nullable',
            'customer_name' => 'required|max:255',
            'phone_no' => 'required',
            'email' => 'max:255',
            'address' => 'max:255',
            'company_name' => 'max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'max:255' => 'لا يجب أن يتخطي 255 حرف',
            'date' => 'هذا الحقل يجب ان يكون تاريخ'
        ];
    }
}
