<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\DTO\Article\CreateArticleDTO;
use App\DTO\Article\UpdateArticleDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Services\ArticleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class ArticleController extends Controller
{
    public function __construct(private readonly ArticleService $articleService) {}

    public function index(): View
    {
        return view('article.index', [
            'articles' => Article::query()
                ->with('category')
                ->get(),
        ]);
    }


    public function create(): View
    {
        return view('article.create', [
            'users' => User::query()->get(),
            'categories' => Category::query()->get(),
        ]);
    }


    public function store(StoreRequest $request): RedirectResponse
    {
        return $this->articleService->store($request->toDTO(CreateArticleDTO::class));
    }


    public function show(Article $article): void {}


    public function edit(Article $article): View
    {
        return view('article.edit', [
            'article' => $article,
            'categories' => Category::query()->get(),
            'users' => User::query()->get(),
        ]);
    }


    public function update(Article $article, UpdateRequest $request): RedirectResponse
    {
        return $this->articleService->update(
            $request->toDTO(UpdateArticleDTO::class),
            $article,
        );
    }


    public function destroy(Article $article): RedirectResponse
    {
        $this->articleService->delete($article);

        return redirect()->back();
    }
}
