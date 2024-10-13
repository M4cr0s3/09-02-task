<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\RegisterPageController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function (): void {

    Route::middleware('guest')->group(function (): void {

        Route::group(['prefix' => 'register'], function (): void {

            Route::get('/', RegisterPageController::class)
                ->name('register.index');

            Route::post('/', [AuthController::class, 'register'])
                ->name('register');

        });

        Route::group(['prefix' => 'login'], function (): void {

            Route::get('/', LoginPageController::class)
                ->name('login.index');

            Route::post('/', [AuthController::class, 'login'])
                ->name('login');

        });

    });

    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout')
        ->middleware('auth');

});
