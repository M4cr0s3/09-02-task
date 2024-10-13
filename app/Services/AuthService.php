<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Auth\LoginDTO;
use App\DTO\Auth\RegisterDTO;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final readonly class AuthService
{
    public function __construct(private UserRepository $userRepository) {}

    public function register(RegisterDTO $registerDTO): RedirectResponse
    {
        $this->userRepository->create($registerDTO);

        return redirect()->route('login.index');
    }

    public function login(LoginDTO $loginDTO): RedirectResponse
    {
        $user = $this->userRepository->findByLogin($loginDTO->getLogin());

        if ( ! $user || ! Hash::check($loginDTO->getPassword(), $user->password)) {
            return redirect()->route('login.index')->withErrors([
                'login' => 'Неверное имя пользователя или пароль',
            ]);
        }

        Auth::login($user);

        return redirect()->route('index');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
