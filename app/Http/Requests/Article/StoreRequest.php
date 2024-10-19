<?php

declare(strict_types=1);

namespace App\Http\Requests\Article;

use App\Traits\HasDTO;
use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest
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
                'required',
                'string',
            ],
            'content' => [
                'required',
                'string',
            ],
            'category_id' => [
                'required',
                'exists:categories,id',
            ],
            'time_to_read' => [
                'required',
                'integer',
            ],
            'image' => [
                'required',
                'file',
            ],
            'user_id' => [
                'required',
                'exists:users,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.exists' => 'Категории не существует.',
            'user_id.exists' => 'Пользователя не существует.',
            'image.required' => 'Изображение обязательно.',
            'time_to_read.integer' => 'Время прочтения статьи должно быть целым положительным числом.',
            'time_to_read.required' => 'Время прочтения статьи обязательно.',
            'content.string' => 'Содержание статьи должно быть строкой.',
            'content.required' => 'Содержание статьи обязательно.',
            'title.string' => 'Заголовок статьи должен быть строкой.',
            'title.required' => 'Заголовок статьи обязателен.',
        ];
    }
}
