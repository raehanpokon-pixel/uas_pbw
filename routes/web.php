<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;



// Redirect awal ke home
Route::get('/', function () {
    return redirect()->route('home');
})->name('root');




Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Tujuan redirect
Route::get('/admin/produk', function () {
    return "HALAMAN ADMIN - PRODUK";
});

Route::get('/produk', function () {
    return "HALAMAN USER - PRODUK";
});
Route::get('/logout', function () {
    // Hapus semua session login
    session()->flush();

    // Kembali ke halaman login
    return redirect('/login');
})->name('logout');




// HOME
Route::get('/home', [HomeController::class, 'index'])->name('home');

// PRODUK (UNTUK USER)
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/kategori/{id}', [ProdukController::class, 'byKategori'])->name('produk.byKategori');
Route::get('/produk/gender/{gender}', [ProdukController::class, 'byGender'])->name('produk.gender');
Route::get('/search', [ProdukController::class, 'search'])->name('produk.search');

// ABOUT
Route::get('/about', function () {
    return view('about');
})->name('about');

// REGISTER
Route::get('/register', function () {
    return 'Halaman register belum dibuat';
})->name('register');

// TEST
Route::get('/tes', function () {
    return 'Halo Bbi, ini rute tes! Server sudah membaca file baru.';
});

// ==============================
// ADMIN ROUTE (PAKAI PREFIX)
// ==============================
Route::prefix('admin')->group(function () {

    // Halaman list produk admin
    Route::get('/produk', [AdminController::class, 'index'])->name('admin.index');

    // Halaman tambah produk admin
    Route::get('/produk/create', [AdminController::class, 'create'])->name('admin.create');

    // Simpan produk admin
    Route::post('/produk', [AdminController::class, 'store'])->name('admin.store');

      // halaman form edit
    Route::get('/produk/{id}/edit', [AdminController::class, 'edit'])
        ->name('admin.edit');

          // update data produk
    Route::put('/produk/{id}', [AdminController::class, 'update'])
        ->name('admin.update');

        // hapus produk
    Route::delete('/produk/{id}', [AdminController::class, 'destroy'])
        ->name('admin.destroy');
});
