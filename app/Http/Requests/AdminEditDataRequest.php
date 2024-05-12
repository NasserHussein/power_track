<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEditDataRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'max:255',
            'phone_no' => 'numeric',
            'photo' => 'mimes:jpeg,png,jpg,gif,svg'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'max' => 'لا يمكن كتابة أكثر من 255 حرف',
            'string' => 'الاسم يجب ان يكون أحرف',
            'numeric' => 'رقم الهاتف يجب ان يكون أرقام',
            'mimes' => 'يجب ان يكون الملف المرفوع صورة'
        ];
    }
}
