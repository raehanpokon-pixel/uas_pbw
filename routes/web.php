<?php

use App\Http\Controllers\ProdukController;

Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/kategori/{id}', [ProdukController::class, 'byKategori'])->name('produk.byKategori');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create  ');


Route::get('/about', function () {
    return view('about');
})->name('about');
