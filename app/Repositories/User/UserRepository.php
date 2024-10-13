<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\DTO\Auth\RegisterDTO;
use App\Models\User;

interface UserRepository
{
    public function create(RegisterDTO $registerDTO): User;

    public function findByLogin(string $login): ?User;
}
