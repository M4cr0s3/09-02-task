<?php

declare(strict_types=1);

namespace App\Traits;

use App\DTO\DTO;

trait HasDTO
{
    /**
     * @template T
     *
     * @param  class-string<T>  $class
     * @return T
     */
    public function toDTO(string $class): DTO
    {
        return new $class(...$this->validated());
    }
}
