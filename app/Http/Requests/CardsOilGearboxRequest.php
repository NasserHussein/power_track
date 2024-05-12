<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardsOilGearboxRequest extends FormRequest
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
            'date_of_oil_gearbox' => 'date',
            'oil_hours_gearbox' => 'numeric|required'
        ];
    }
    public function messages()
    {
        return [
            'date' => 'هذا الحقل يجب ان يكون تاريخ',
            'numeric' => 'هذا الحقل يجب ان يكون ارقام',
            'required' => 'هذا الحقل مطلوب'
        ];
    }
}
