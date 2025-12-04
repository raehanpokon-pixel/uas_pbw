<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Kita akan berpura-pura melakukan hashing di sini
use Illuminate\Support\Facades\Session; // Untuk simulasi penyimpanan data

class AuthController extends Controller
{
    // --- Login Methods ---

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // ==== LOGIN ADMIN (Hardcoded) ====
        if ($email === "admin@gmail.com" && $password === "admin123") {
            // Dalam aplikasi nyata, gunakan Auth::login($user)
            return redirect('/admin/produk');
        }

        // ==== LOGIN USER (Hardcoded) ====
        if ($email === "user@gmail.com" && $password === "user123") {
            // Dalam aplikasi nyata, gunakan Auth::login($user)
            return redirect('/produk');
        }

        // Jika salah
        return back()->with('error', 'Email atau password salah!');
    }

    // --- Register Methods ---

    /**
     * Menampilkan formulir registrasi.
     */
    public function showRegister()
    {
        return view('auth.register'); // Mengarahkan ke blade view 'auth/register.blade.php'
    }

    /**
     * Memproses registrasi pengguna baru.
     */
    public function register(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Gunakan 'users' sebagai nama tabel yang seharusnya
            'password' => 'required|string|min:8|confirmed',
        ], [
            // Pesan kustom untuk validasi
            'email.unique' => 'Email ini sudah terdaftar. Silakan gunakan email lain.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // 2. Simulasi Pendaftaran (Dalam aplikasi nyata, ini adalah bagian untuk menyimpan ke database)
        // Kita akan simulasikan pengguna baru yang terdaftar
        $user_data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            // Penting: Selalu hash password sebelum disimpan! (Simulasi: Hash::make($request->password))
            'password' => 'hashed_password_placeholder', 
        ];

        // Seharusnya: User::create($user_data);

        // 3. Pengalihan Sukses
        // Setelah registrasi sukses, arahkan ke halaman login
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan masuk menggunakan akun Anda.');
    }
}