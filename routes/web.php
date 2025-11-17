<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController; // <-- Ini sudah benar

// 🟢 1️⃣ Ketika pertama kali buka server → langsung ke login
Route::get('/', function () {
    return redirect()->route('home');
})->name('root');

// 🟢 2️⃣ LOGIN & LOGOUT
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// 🟢 3️⃣ Halaman utama (landing page setelah login)
//
// HAPUS BARIS LAMA ANDA:
// Route::get('/home', 'home')->name('home');
//
// GANTI DENGAN BARIS INI:
Route::get('/home', [HomeController::class, 'index'])->name('home');
//
// [HomeController::class, 'index'] memberi tahu Laravel untuk
// menjalankan method 'index' di dalam 'HomeController' Anda.

// 🟢 4️⃣ Halaman Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/kategori/{id}', [ProdukController::class, 'byKategori'])->name('produk.byKategori');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::get('/search', [ProdukController::class, 'search'])->name('produk.search');
Route::get('/produk/gender/{gender}', [ProdukController::class, 'byGender'])
    ->name('produk.gender');

// 🟢 5️⃣ Halaman About
Route::get('/about', function () {
    return view('about');
})->name('about');

// 🟢 6️⃣ REGISTER (sementara)
Route::get('/register', function () {
    return 'Halaman register belum dibuat';
})->name('register');