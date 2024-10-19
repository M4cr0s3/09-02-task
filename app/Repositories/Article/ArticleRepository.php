<?php

declare(strict_types=1);

namespace App\Repositories\Article;

use App\DTO\Article\CreateArticleDTO;
use App\DTO\Article\UpdateArticleDTO;
use App\Models\Article;

interface ArticleRepository
{
    public function create(CreateArticleDTO $createArticleDTO): Article;

    public function update(UpdateArticleDTO $updateArticleDTO, Article $article): void;

    public function delete(Article $article): void;
}
