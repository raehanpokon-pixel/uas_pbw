<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;


// Redirect awal ke home
Route::get('/', function () {
    return redirect()->route('home');
})->name('root');


// ==============================
// AUTH (LOGIN & REGISTER)
// ==============================

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// REGISTER (INI YANG BENAR)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// LOGOUT
Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');
})->name('logout');


// ==============================
// USER HOME & PRODUK
// ==============================

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/kategori/{id}', [ProdukController::class, 'byKategori'])->name('produk.byKategori');
Route::get('/produk/gender/{gender}', [ProdukController::class, 'byGender'])->name('produk.gender');
Route::get('/search', [ProdukController::class, 'search'])->name('produk.search');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout');





// ABOUT
Route::get('/about', function () {
    return view('about');
})->name('about');

// CONTACT
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


// ==============================
// ADMIN ROUTE (PAKAI PREFIX)
// ==============================
Route::prefix('admin')->group(function () {

    // ADMIN PRODUK
    Route::get('/produk', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/produk/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/produk', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/produk/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/produk/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/produk/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    
});

Route::get('/trans', function () {
    return view ('transaksi');
})->name('tr');