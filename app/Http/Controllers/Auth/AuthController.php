<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\DTO\Auth\LoginDTO;
use App\DTO\Auth\RegisterDTO;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

final readonly class AuthController
{
    public function __construct(private AuthService $authService) {}

    public function register(RegisterRequest $request): RedirectResponse
    {
        return $this->authService->register($request->toDTO(RegisterDTO::class));
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        return $this->authService->login($request->toDTO(LoginDTO::class));
    }

    public function logout(): RedirectResponse
    {
        return $this->authService->logout();
    }
}
