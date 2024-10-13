<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

final readonly class AuthController
{
    public function __construct(private AuthService $authService) {}

    public function register(RegisterRequest $request): RedirectResponse
    {
        return $this->authService->register($request->convertToDTO());
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        return $this->authService->login($request->convertToDTO());
    }

    public function logout(): RedirectResponse
    {
        return $this->authService->logout();
    }
}
