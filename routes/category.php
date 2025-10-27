<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'getAll'])->name('category.getAll');

    Route::post('/add', [CategoryController::class, 'create'])->name('category.create');

    Route::get('/add', function () {
        return view('category.add');
    });

    Route::put('/{category}', [CategoryController::class, 'update'])->name('category.update');

    Route::delete('/categorys/{category}', [CategoryController::class, 'deleteBindedModel'])->name('category.destroy');
});
