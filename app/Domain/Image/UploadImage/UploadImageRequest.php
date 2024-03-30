<?php

declare(strict_types=1);

namespace App\Domain\Image\UploadImage;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Полето за изображение е задължително.',
            'name.image' => 'Файлът трябва да бъде изображение.',
            'name.mimes' => 'Изображението трябва да бъде във формат jpeg, png, jpg или gif.',
            'name.max' => 'Максималният размер на изображението е 2MB.',
            'description.string' => 'Описанието трябва да бъде текст.',
            'description.max' => 'Максималният брой символи за описание е 255.'
        ];
    }
}
