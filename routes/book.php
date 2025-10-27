<?php

use App\Exports\BookExport;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportBook;

Route::prefix('book')->group(function () {
    Route::get('/', [BookController::class, 'getAll'])->name('book.getAll');

    Route::post('/add', [BookController::class, 'create'])->name('book.add');

    Route::post('/import', function (Request $request) {
        Excel::import(new ImportBook, $request->file('file'));

        return response()->json([
            'message' => 'Sukses'
        ], 200);
    })->name('book.import');

    Route::get('/export', function () {
        return Excel::download(new BookExport, 'book.xlsx');
    })->name('book.export');
});
