<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // ==== LOGIN ADMIN ====
        if ($email === "admin@gmail.com" && $password === "admin123") {
            return redirect('/admin/produk');
        }

        // ==== LOGIN USER ====
        if ($email === "user@gmail.com" && $password === "user123") {
            return redirect('/produk');
        }

        // Jika salah
        return back()->with('error', 'Email atau password salah!');
    }
}
