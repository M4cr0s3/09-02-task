<?php

declare(strict_types=1);

namespace App\Repositories\Category;

use App\DTO\Category\CreateCategoryDTO;
use App\DTO\Category\UpdateCategoryDTO;
use App\Models\Category;

final readonly class CategoryRepositoryImpl implements CategoryRepository
{
    public function create(CreateCategoryDTO $createCategoryDTO): Category
    {
        return Category::query()
            ->create($createCategoryDTO->toArray());
    }

    public function getById(int $id): ?Category
    {
        return Category::query()
            ->findOrFail($id);
    }

    public function getByTitle(string $title): ?Category
    {
        return Category::query()
            ->where('title', $title)
            ->first();
    }

    public function update(UpdateCategoryDTO $updateCategoryDTO, Category $category): Category
    {
        $category->update($updateCategoryDTO->toArray());

        return $category;
    }


    public function delete(Category $category): void
    {
        $category->delete();
    }
}
