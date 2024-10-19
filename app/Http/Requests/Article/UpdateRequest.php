<?php

declare(strict_types=1);

namespace App\Http\Requests\Article;

use App\Traits\HasDTO;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateRequest extends FormRequest
{
    use HasDTO;

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
                'string',
            ],
            'content' => [
                'nullable',
                'string',
            ],
            'category_id' => [
                'nullable',
                'exists:categories,id',
            ],
            'time_to_read' => [
                'nullable',
                'integer',
            ],
            'image' => [
                'nullable',
                'file',
            ],
            'user_id' => [
                'nullable',
                'exists:users,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.exists' => 'Категории не существует.',
            'user_id.exists' => 'Пользователя не существует.',
            'time_to_read.integer' => 'Время прочтения статьи должно быть целым положительным числом.',
            'content.string' => 'Содержание статьи должно быть строкой.',
            'title.string' => 'Заголовок статьи должен быть строкой.',
        ];
    }
}
