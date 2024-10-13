<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\DTO\Auth\LoginDTO;
use App\DTO\Contracts\ConvertableToDTO;
use App\Traits\HasDTO;
use Illuminate\Foundation\Http\FormRequest;

final class LoginRequest extends FormRequest implements ConvertableToDTO
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
            'login' => [
                'required',
                'exists:users,login',
            ],
            'password' => [
                'required',
                'string',
                'min:6',
            ],
        ];
    }

    public function convertToDTO(): LoginDTO
    {
        return $this->toDTO(LoginDTO::class);
    }
}
