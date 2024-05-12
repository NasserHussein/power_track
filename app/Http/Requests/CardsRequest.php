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
            'code' => 'max:255',
            'part' => 'max:255',
            'model' => 'max:255',
            'date_of_start' => 'max:255',
            'weight' => 'max:255',
            'maker' => 'max:255',
            'drg_no' => 'max:255',
            'dimensions' => 'max:255',
            'supplier' => 'max:255',
            'inst_bk_no' => 'max:255',
            'power' => 'max:255',
            'mfg_order_no' => 'max:255',
            'maintenance_bk_no' => 'max:255',
            'control_voltage' => 'max:255',
            'purchase_order_no' => 'max:255',
            'capacity' => 'max:255',
            'total_amperage' => 'max:255',
            'serial_no' => 'max:255',
            'material' => 'max:255',
            'additional_data' => 'max:255',
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
