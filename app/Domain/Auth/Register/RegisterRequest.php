<?php

declare(strict_types=1);

namespace App\Domain\Auth\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Полето за име е задължително.',
            'name.string' => 'Полето за име трябва да бъде текст.',
            'name.max' => 'Полето за име трябва да бъде максимум :max символа.',
            'email.required' => 'Полето за имейл адрес е задължително.',
            'email.string' => 'Полето за имейл адрес трябва да бъде текст.',
            'email.email' => 'Полето за имейл адрес трябва да бъде валиден имейл адрес.',
            'email.max' => 'Полето за имейл адрес трябва да бъде максимум :max символа.',
            'email.unique' => 'Имейл адресът вече е регистриран.',
            'password.required' => 'Полето за парола е задължително.',
            'password.string' => 'Полето за парола трябва да бъде текст.',
            'password.min' => 'Полето за парола трябва да бъде поне :min символа.',
            'password.confirmed' => 'Потвърждението на паролата не съвпада.'
        ];
    }
}
