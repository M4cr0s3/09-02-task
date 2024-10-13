<?php

declare(strict_types=1);

namespace App\Http\Controllers\Category;

use App\DTO\Category\UpdateCategoryDTO;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final readonly class CategoryController
{
    public function __construct(private CategoryService $categoryService) {}

    public function index(): View
    {
        $categories = Category::query()->get();

        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        return $this->categoryService->store($request->convertToDTO());
    }

    public function show(Category $category): View
    {
        return view('category.show', [
            'category' => $category,
        ]);
    }

    public function edit(Category $category): View
    {
        return view('category.edit', [
            'category' => $category,
        ]);
    }

    public function update(UpdateRequest $request, Category $category): RedirectResponse
    {
        return $this->categoryService->update(
            $request->toDTO(UpdateCategoryDTO::class),
            $category,
        );
    }

    public function destroy(Category $category): RedirectResponse
    {
        $this->categoryService->destroy($category);

        return redirect()->route('categories.index');
    }
}
