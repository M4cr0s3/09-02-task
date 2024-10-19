<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Traits\HasDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class RegisterRequest extends FormRequest
{
    use HasDTO;

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
            'firstname' => [
                'required',
                'string',
                'regex:/^[а-яА-ЯёЁ\s\-]+$/u',
            ],
            'lastname' => [
                'required',
                'string',
                'regex:/^[а-яА-ЯёЁ\s\-]+$/u',
            ],
            'patronymic' => [
                'nullable',
                'regex:/^[а-яА-ЯёЁ\s\-]+$/u',
            ],
            'login' => [
                'required',
                'unique:users,login',
                'regex:/^[a-zA-Z0-9\-]+$/u',
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:6',
            ],
            'rules' => [
                'required',
                Rule::in(['on']),
            ],
        ];
    }

}
