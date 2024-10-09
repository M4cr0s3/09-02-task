<?php

namespace App\Traits;

use App\Http\DTO\DTO;

trait HasDTO
{
    public function toDTO(string $class): DTO
    {
        return new $class(...$this->validated());
    }
}
