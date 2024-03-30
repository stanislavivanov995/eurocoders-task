<?php

declare(strict_types=1);

namespace App\Domain\Ticket\StoreTicket;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|max:255',
            'text' => 'required|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Полето "Име" е задължително.',
            'name.max' => 'Полето "Име" трябва да е максимум :max символа.',
            'email.required' => 'Полето "Имейл" е задължително.',
            'email.max' => 'Полето "Имейл" трябва да е максимум :max символа.',
            'text.required' => 'Полето "Съобщение" е задължително.',
            'text.max' => 'Полето "Съобщение" трябва да е максимум :max символа.'
        ];
    }
}
