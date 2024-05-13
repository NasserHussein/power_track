<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
        'invoice_number' => 'required|max:255',
        'description' => 'max:255',
        'invoice_value' => 'required|numeric',
        'invoice_data' => 'max:800|required',
        'invoice_date' => 'required|date',
        'notes' => 'max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'max' => 'هذا الحقل لا يجب ان يزيد عن 255 حرف',
            'numeric' => 'هذا الحقل يجب ان يكون ارقام',
            'invoice_data.max' => 'هذا الحقل لا يجب ان يزيد عن 800 حرف'
        ];
    }
}
