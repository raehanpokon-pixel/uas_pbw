<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $produk = Produk::findOrFail($id);
        return view('transaksi', compact('produk'));
    }
}
