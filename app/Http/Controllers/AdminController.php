<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ===============================
    // 1. HALAMAN DAFTAR PRODUK ADMIN
    // ===============================
    public function index()
    {
        $produks = Produk::all();
        return view('admin.index', compact('produks'));
    }

    // ===============================
    // 2. HALAMAN FORM CREATE PRODUK
    // ===============================
    public function create()
    {
        $kategoris = Kategori::all();
        return view('input.create', compact('kategoris'));
    }

    // ===============================
    // 3. SIMPAN PRODUK BARU (STORE)
    // ===============================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('produk', 'public');
        }

        Produk::create($validated);

        return redirect()->route('admin.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // ===============================
    // 4. HALAMAN EDIT PRODUK
    // ===============================
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all(); // diperbaiki dari $kategori

        return view('admin.edit', compact('produk', 'kategoris'));
    }

    // ===============================
    // 5. UPDATE PRODUK
    // ===============================
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->kategori_id = $request->kategori_id;

        // Jika ganti foto baru
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public', $namaFoto);

            $produk->foto = $namaFoto;
        }

        $produk->save();

        return redirect()->route('admin.index')->with('success', 'Produk berhasil diupdate!');
    }

    // ===============================
    // 6. HAPUS PRODUK
    // ===============================
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('admin.index')->with('success', 'Produk berhasil dihapus!');
    }
}
