<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Http\DTO\RegisterDTO;
use App\Models\User;

class UserRepositoryImpl implements UserRepository
{
    public function create(RegisterDTO $registerDTO): User
    {
        return User::query()
            ->create($registerDTO->toArray());
    }

    public function findByLogin(string $login): ?User
    {
        return User::query()
            ->where('login', $login)
            ->first();
    }
}
