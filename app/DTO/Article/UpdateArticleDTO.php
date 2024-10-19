<?php

declare(strict_types=1);

namespace App\DTO\Article;

use App\DTO\DTO;
use Illuminate\Http\UploadedFile;

final class UpdateArticleDTO extends DTO
{
    public function __construct(
        private readonly ?string          $title,
        private readonly ?string          $content,
        private readonly ?string          $category_id,
        private readonly ?string          $time_to_read,
        private readonly ?string          $user_id,
        private UploadedFile|string|null  $image = null,
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCategoryId(): string
    {
        return $this->category_id;
    }

    public function getTimeToRead(): ?string
    {
        return $this->time_to_read;
    }

    public function getImage(): string|UploadedFile|null
    {
        return $this->image;
    }

    public function setImage(string|UploadedFile $image): void
    {
        $this->image = $image;
    }


    public function getUserId(): string
    {
        return $this->user_id;
    }

}
