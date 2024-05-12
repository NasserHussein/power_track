<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientChangePasswordRequest extends FormRequest
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
        'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|max:255|confirmed',
        'old_password' =>'required|string|min:8|max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'max' => 'لا يمكن للحقل ان يذيد عن 255 حرف',
            'password.min' => 'كلمة المرور يجب ان لا تقل عن 8 احرف',
            'old_password.min' => 'كلمة المرور يجب ان لا تقل عن 8 احرف',
            'password.confirmed' => 'كلمة المرور لا تتطابق',
            'password.regex' => 'كلمة المرور يجب ان تحتوي علي حروف وأرقام + حرف كبير علي الاقل',
        ];
    }
}
