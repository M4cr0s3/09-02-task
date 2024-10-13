<?php

declare(strict_types=1);

namespace App\DTO\Auth;

use App\DTO\DTO;

final class RegisterDTO extends DTO
{
    public function __construct(
        private readonly string $firstname,
        private readonly string $lastname,
        private string $login,
        private readonly ?string $patronymic,
        private readonly string $email,
        private readonly ?string $password,
        private readonly string $rules,
    ) {}

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getRules(): string
    {
        return $this->rules;
    }
}
