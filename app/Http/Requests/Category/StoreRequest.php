<?php

declare(strict_types=1);

namespace App\Http\Requests\Category;

use App\DTO\Category\CreateCategoryDTO;
use App\DTO\Contracts\ConvertableToDTO;
use App\Traits\HasDTO;
use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest implements ConvertableToDTO
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
                'unique:categories,title',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Данное поле обязательно к заполнению.',
            'title.unique' => 'Категория с таким названием уже существует.',
        ];
    }

    public function convertToDTO(): CreateCategoryDTO
    {
        return $this->toDTO(CreateCategoryDTO::class);
    }
}
