<?php

declare(strict_types=1);

namespace App\DTO\Category;

use App\DTO\DTO;

final class UpdateCategoryDTO extends DTO
{
    public function __construct(
        private readonly string $title,
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }
}
