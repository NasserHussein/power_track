<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotifieRequest extends FormRequest
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
            'spare_parts' => 'required',
            'notification_date' => 'date|required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'date' => 'هذا الحقل يجب ان يكون تاريخ'
        ];
    }
}
