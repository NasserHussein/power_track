<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'card_no' => 'max:255',
            'part' => 'max:255',
            'card_model' => 'max:255',
            'model_year' => 'max:255',
            'brand_name' => 'max:255',
            'mast_type' => 'max:255',
            'tire_type' => 'max:255',
            'card_load' => 'max:255',
            'chassis_no' => 'max:255',
            'safety' => 'max:255',
            'battery' => 'max:255',
            'charger' => 'max:255',
            'charging_plug' => 'max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'max' => 'هذا الحقل لا يجب ان يزيد عن 255 حرف'
        ];
    }
}
