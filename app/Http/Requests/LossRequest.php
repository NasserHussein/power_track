<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LossRequest extends FormRequest
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
            'description_of_loss' => 'required|max:255',
            'date_of_loss' => 'required|date',
            'amount' => 'required|numeric',
            'cause_of_loss' => 'max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'max' => 'لا يجب ان يزيد هذا الحقل عن 255 حرف',
            'numeric' => 'هذا الحقل يجب ان يكون ارقام صحيحة',
            'date' => 'هذا الحقل يجب ان يكون تاريخ'
        ];
    }
}
