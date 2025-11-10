<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        $produks = Produk::all();
        return view('produk.index', compact('kategoris', 'produks'));
    }

    public function byKategori($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategoris = Kategori::all();
        $produks = Produk::where('kategori_id', $id)->get();
        return view('produk.index', compact('kategoris', 'produks', 'kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('produk', 'public');
        }


        Produk::create($validated);


        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    public function create()
{
    $kategoris = Kategori::all();
    return view('input.craete', compact('kategoris'));
}

}
