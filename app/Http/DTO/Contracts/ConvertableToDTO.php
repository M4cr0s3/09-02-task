<?php

namespace App\Http\DTO\Contracts;

use App\Http\DTO\DTO;

interface ConvertableToDTO
{
    public function convertToDTO(): DTO;
}
