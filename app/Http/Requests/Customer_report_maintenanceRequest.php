<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Customer_report_maintenanceRequest extends FormRequest
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
            'card_state_after_maintenance' => 'required|max:255',
            'work_details' => 'required|max:255',
            'spare_parts' => 'max:255',
            'date_of_finishing' => 'nullable|date',
            'technicians' => 'required',
            'delivery_date' => 'nullable|date',
            'maintenance_cost' => 'nullable|numeric'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'max' => 'هذا الحقل لا يجب ان يزيد عن 255 حرف',
            'date' => 'هذا الحقل يجب ان يكون تاريخ',
            'numeric' => 'هذا الحقل يجب ان يكون ارقام'
        ];
    }
}
