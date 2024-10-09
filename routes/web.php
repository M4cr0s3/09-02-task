<?php

declare(strict_types=1);

use App\Http\Controllers\IndexPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexPageController::class)
    ->name('index');

require __DIR__ . '/auth.php';
