<?php

declare(strict_types=1);

use App\Http\Controllers\Category\CategoryController;

Route::group(['prefix' => 'categories', 'middleware' => [
    'auth',
    'admin',
]], function (): void {

    Route::get('/', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::post('/', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::group(['prefix' => '{category}'], function (): void {

        Route::get('/', [CategoryController::class, 'show'])
            ->name('categories.show');

        Route::get('/edit', [CategoryController::class, 'edit'])
            ->name('categories.edit');

        Route::patch('/', [CategoryController::class, 'update'])
            ->name('categories.update');

        Route::delete('/', [CategoryController::class, 'destroy'])
            ->name('categories.destroy');

    });

});
