<?php

declare(strict_types=1);

namespace App\DTO\Contracts;

use App\DTO\DTO;

interface ConvertableToDTO
{
    /**
     * @template T
     * @return T
     */
    public function convertToDTO(): DTO;
}
