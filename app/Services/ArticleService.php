<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Article\CreateArticleDTO;
use App\DTO\Article\UpdateArticleDTO;
use App\Models\Article;
use App\Repositories\Article\ArticleRepository;
use Illuminate\Http\RedirectResponse;
use Storage;

final readonly class ArticleService
{
    public function __construct(private ArticleRepository $articleRepository) {}

    public function store(CreateArticleDTO $createArticleDTO): RedirectResponse
    {
        $path = Storage::disk('public')->put('/images', $createArticleDTO->getImage());
        $createArticleDTO->setImage('storage/' . $path);

        $this->articleRepository->create($createArticleDTO);

        return redirect()->route('articles.index');
    }

    public function update(UpdateArticleDTO $updateArticleDTO, Article $article): RedirectResponse
    {
        if ($updateArticleDTO->getImage()) {
            $path = Storage::disk('public')->put('/images', $updateArticleDTO->getImage());
            $updateArticleDTO->setImage('storage/' . $path);
        }

        $this->articleRepository->update($updateArticleDTO, $article);

        return redirect()->route('articles.index');
    }

    public function delete(Article $article): void
    {
        $this->articleRepository->delete($article);
    }

}
