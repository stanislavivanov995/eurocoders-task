<?php

declare(strict_types=1);

namespace App\Domain\Auth\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Полето за имейл адрес е задължително.',
            'email.email' => 'Полето за имейл адрес трябва да бъде валиден имейл адрес.',
            'password.required' => 'Полето за парола е задължително.'
        ];
    }
}
