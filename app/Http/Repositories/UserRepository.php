<?php

namespace App\Http\Repositories;

use App\Http\DTO\RegisterDTO;
use App\Models\User;

interface UserRepository
{

    public function create(RegisterDTO $registerDTO): User;

    public function findByLogin(string $login): ?User;
}
