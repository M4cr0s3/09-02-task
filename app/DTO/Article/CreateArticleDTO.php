<?php

declare(strict_types=1);

namespace App\DTO\Article;

use App\DTO\DTO;
use Illuminate\Http\UploadedFile;

final class CreateArticleDTO extends DTO
{
    public function __construct(
        private readonly string     $title,
        private readonly string     $content,
        private readonly string     $category_id,
        private readonly string     $time_to_read,
        private UploadedFile|string $image,
        private readonly string     $user_id,
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

    public function getTimeToRead(): string
    {
        return $this->time_to_read;
    }

    public function getImage(): UploadedFile|string
    {
        return $this->image;
    }

    public function getUserId(): string
    {
        return $this->user_id;
    }

    public function setImage(string|UploadedFile $image): void
    {
        $this->image = $image;
    }

    /**
     * @return array{
     *     title: string,
     *     content: string,
     *     category_id: string,
     *     time_to_read: string,
     *     image: string|UploadedFile,
     *     user_id: string
     * }
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
