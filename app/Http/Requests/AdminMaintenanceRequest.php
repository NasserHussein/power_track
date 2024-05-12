<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminMaintenanceRequest extends FormRequest
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
            'maintenance' => 'required',
            'spare_parts' => 'max:255',
            'cost' => 'numeric|required',
            'date' => 'date|required',
            'duration' => 'numeric|nullable',
            'technician_name' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'max' => 'لا يمكن ان يزيد هذا الحقل عن 255 حرف',
            'date' => 'هذا الحقل يجب ان يكون تاريخ',
            'numeric' => 'هذا الحقل يجب ان يكون أرقام'
        ];
    }
}
