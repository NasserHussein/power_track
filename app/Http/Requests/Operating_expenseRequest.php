<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Operating_expenseRequest extends FormRequest
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
            'clause' => 'required|max:255',
            'description' => 'max:255',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'person_responsible_for_payment' => 'max:255',
            'notes' => 'max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'date' => 'هذا الحقل يجب ان يكون تاريخ',
            'numeric' => 'هذا الحقل يجب ان يكون ارقام',
            'max' => 'هذا الحقل يجب ان لا يزيد عن 255 حرف'
        ];
    }
}
