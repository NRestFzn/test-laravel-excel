<?php

use App\Http\Controllers\ProfileController;
use App\Models\Buku;
use App\Models\BukuPenerbit;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/penulis', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('penulis.index');


Route::middleware(['auth', RoleMiddleware::class . ':admin', PermissionMiddleware::class . ':add book'])->group(function () {
    Route::get('/book', function () {
        $bukus = Buku::with(['penerbits', 'penulis', 'kategori'])->get();

        return view('book.index', compact('bukus'));
    })->name('book.index');

    Route::get('/book/add', function () {
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('book.add', compact('penulis', 'penerbit', 'kategori'));
    })->name('book.add');

    Route::delete('/book/destroy', function () {
        return redirect('/');
    })->name('book.destroy');

    Route::post('/book/add', function (Request $request) {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis_id' => 'required|exists:penulises,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'penerbit_id' => 'required|exists:penerbits,id'
        ]);

        $buku = new Buku();
        $buku->judul = $validated['judul'];
        $buku->penulis_id = $validated['penulis_id'];
        $buku->kategori_id = $validated['kategori_id'];
        $buku->save();

        BukuPenerbit::create([
            "buku_id" => $buku->id,
            "penerbit_id" => $validated['penerbit_id']
        ]);

        return redirect()->route('book.index');
    })->name('book.add.post');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
