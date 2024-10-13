<?php

declare(strict_types=1);

namespace App\Http\Requests\Category;

use App\Traits\HasDTO;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateRequest extends FormRequest
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
            'title' => [
                'nullable',
                'unique:categories,title',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.unique' => 'Категория с таким названием уже существует.',
        ];
    }
}
