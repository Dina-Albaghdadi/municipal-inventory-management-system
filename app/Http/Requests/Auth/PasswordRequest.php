<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لإرسال هذا الطلب.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * قواعد التحقق من البيانات المرسلة (قاعدة البيانات تتوقع إيميل).
     */
    public function rules(): array
    {
        return [
            // التحقق من وجود الإيميل في جدول users بناءً على الـ ERD [1]
            'email' => ['required', 'email', 'exists:users,email'],
        ];
    }

    /**
     * تخصيص رسائل الخطأ بالإنجليزية لتناسب تقاريرك الفنية.
     */
    public function messages(): array
    {
        return [
            'email.required' => 'The email address is required to reset your password.',
            'email.email' => 'Please provide a valid email address.',
            'email.exists' => 'This email address is not registered in our municipal system.',
        ];
    }
}