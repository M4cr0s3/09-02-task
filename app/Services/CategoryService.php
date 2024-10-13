<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Category\CreateCategoryDTO;
use App\DTO\Category\UpdateCategoryDTO;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\RedirectResponse;

final readonly class CategoryService
{
    public function __construct(private CategoryRepository $categoryRepository) {}

    public function store(CreateCategoryDTO $createCategoryDTO): RedirectResponse
    {
        $this->categoryRepository->create($createCategoryDTO);

        return redirect()->back();
    }

    public function update(UpdateCategoryDTO $updateCategoryDTO, Category $category): RedirectResponse
    {
        $this->categoryRepository->update($updateCategoryDTO, $category);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category): void
    {
        $this->categoryRepository->delete($category);
    }
}
