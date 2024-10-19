<?php

declare(strict_types=1);

namespace App\Repositories\Article;

use App\DTO\Article\CreateArticleDTO;
use App\DTO\Article\UpdateArticleDTO;
use App\Models\Article;

final class ArticleRepositoryImpl implements ArticleRepository
{
    public function create(CreateArticleDTO $createArticleDTO): Article
    {
        $data = $createArticleDTO->toArray();

        return Article::query()
            ->create([
                ...$data,
                'image_path' => $data['image'] ?? null,
            ]);
    }

    public function update(UpdateArticleDTO $updateArticleDTO, Article $article): void
    {
        $data = $updateArticleDTO->toArray();

        $article->update(
            [
                ...$data,
                'image_path' => $data['image'] ?? $article->image_path,
            ],
        );
    }

    public function delete(Article $article): void
    {
        $article->delete();
    }
}
