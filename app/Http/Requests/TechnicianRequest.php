<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnicianRequest extends FormRequest
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
            'phone_no' => 'required|max:255',
            'email' => 'max:255',
            'address' => 'max:255',
            'date_of_employment' => 'date|nullable',
            'qualifications' => 'max:255',
            'previous_experience' => 'max:255',
            'technical_skills' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'max' => 'يجب إلا يتخطي 255 حرف',
            'date' => 'يجب ان يكون تاريخ'
        ];
    }
}
