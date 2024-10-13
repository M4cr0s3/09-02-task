<?php

declare(strict_types=1);

namespace App\Repositories\Category;

use App\DTO\Category\CreateCategoryDTO;
use App\DTO\Category\UpdateCategoryDTO;
use App\Models\Category;

interface CategoryRepository
{
    public function create(CreateCategoryDTO $createCategoryDTO): Category;

    public function getById(int $id): ?Category;

    public function getByTitle(string $title): ?Category;

    public function update(UpdateCategoryDTO $updateCategoryDTO, Category $category): Category;

    public function delete(Category $category): void;
}
