<?php

namespace App\Domain\Profile\UpdateProfile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore(auth()->user()->id),
            ],
            'password' => 'nullable|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Полето за име е задължително.',
            'name.max' => 'Името не може да бъде по-дълго от 100 символа.',
            'email.required' => 'Полето за имейл адрес е задължително.',
            'email.email' => 'Моля, въведете валиден имейл адрес.',
            'email.max' => 'Имейл адресът не може да бъде по-дълъг от 255 символа.',
            'email.unique' => 'Вече съществува потребител с този имейл адрес.',
            'password.min' => 'Паролата трябва да съдържа поне 6 символа.',
            'password.confirmed' => 'Полето за потвърждение на паролата не съвпада.'
        ];
    }
}
