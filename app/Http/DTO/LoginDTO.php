<?php

namespace App\Http\DTO;

class LoginDTO extends DTO
{
    public function __construct(
        private readonly string $login,
        private readonly string $password
    )
    {
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
