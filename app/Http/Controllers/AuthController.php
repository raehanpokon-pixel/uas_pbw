<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // ====== TAMPILKAN HALAMAN LOGIN ======
    public function showLogin()
    {
        // Jika sudah login, arahkan langsung ke home
        if (session('user')) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    // ====== PROSES LOGIN ======
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // Otentikasi sederhana (tanpa database)
        if ($email === 'admin@gmail.com' && $password === '123456') {

            // Simpan session login
            session(['user' => $email]);

            // ✅ Arahkan ke halaman home
            return redirect()->route('home');
        } else {
            // ❌ Jika salah → kembali ke login
            return back()->with('error', 'Email atau password salah!');
        }
    }

    // ====== PROSES LOGOUT ======
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }

    // ====== HALAMAN PRODUK (DILINDUNGI LOGIN) ======
    public function produk()
    {
        // Cek login
        if (!session('user')) {
            return redirect()->route('login');
        }

        // Import model
        $kategoris = \App\Models\Kategori::all();
        $produks   = \App\Models\Produk::all();

        return view('produk.index', compact('kategoris', 'produks'));
    }
}
