<?php

declare(strict_types=1);

namespace App\DTO\Auth;

use App\DTO\DTO;

final class LoginDTO extends DTO
{
    public function __construct(
        private readonly string $login,
        private readonly string $password,
    ) {}

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
