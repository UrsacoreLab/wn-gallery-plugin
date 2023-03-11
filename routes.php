<?php

use UrsacoreLab\Gallery\Controllers\CategoryController;
use UrsacoreLab\Gallery\Controllers\GalleryController;

Route::prefix('api')->group(function () {
    Route::prefix('gallery')->group(function () {
        Route::get('categories', [CategoryController::class, 'list']);
        Route::get('category/{slug}', [CategoryController::class, 'single']);

        Route::get('/', [GalleryController::class, 'list']);
        Route::get('{slug}', [GalleryController::class, 'single']);
    });
});
