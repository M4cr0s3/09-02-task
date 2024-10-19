<?php

declare(strict_types=1);

use App\Http\Controllers\Article\ArticleController;

Route::group(['prefix' => 'articles'], function (): void {

    Route::get('/', [ArticleController::class, 'index'])
        ->name('articles.index');

    Route::get('/create', [ArticleController::class, 'create'])
        ->name('articles.create');

    Route::post('/', [ArticleController::class, 'store'])
        ->name('articles.store');

    Route::group(['prefix' => '{article}'], function (): void {

        Route::get('/', [ArticleController::class, 'show'])
            ->name('articles.show');

        Route::get('/edit', [ArticleController::class, 'edit'])
            ->name('articles.edit');

        Route::patch('/', [ArticleController::class, 'update'])
            ->name('articles.update');

        Route::delete('/', [ArticleController::class, 'destroy'])
            ->name('articles.destroy');

    });

});
