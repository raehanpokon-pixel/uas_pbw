<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // ===============================
    // 1. HALAMAN SEMUA PRODUK
    // ===============================
    public function index()
    {
        $gender = request('gender');

        // Filter kategori berdasarkan gender
        if ($gender && in_array($gender, ['men', 'women'])) {
            $kategoris = Kategori::where('gender', $gender)->get();
        } else {
            $kategoris = Kategori::all();
        }

        // Query produk berdasarkan kategori yg sesuai gender
        if ($gender && in_array($gender, ['men', 'women'])) {
            $produks = Produk::whereIn('kategori_id', $kategoris->pluck('id'))->get();
        } else {
            $produks = Produk::all();
        }

        return view('produk.index', compact('kategoris', 'produks', 'gender'));
    }


    // ===============================
    // 2. HALAMAN PRODUK BERDASARKAN KATEGORI
    // ===============================
    public function byKategori($id)
    {
        $gender = request('gender');
        $kategori = Kategori::findOrFail($id);

        if ($gender && in_array($gender, ['men', 'women'])) {
            $kategoris = Kategori::where('gender', $gender)->get();
        } else {
            $kategoris = Kategori::all();
        }

        // Produk berdasarkan kategori
        $produks = Produk::where('kategori_id', $id)->get();

        return view('produk.index', compact('kategoris', 'produks', 'kategori', 'gender'));
    }


    // ===============================
    // 3. STORE PRODUK (PERBAIKAN)
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
    // 4. FORM CREATE PRODUK
    // ===============================
    public function create()
    {
        $kategoris = Kategori::all();
        return view('input.craete', compact('kategoris'));
    }


    // ===============================
    // 5. SEARCH PRODUK (PERBAIKAN)
    // ===============================
    public function search(Request $request)
    {
        $gender = request('gender');
        $query = $request->input('q');

        if ($gender && in_array($gender, ['men', 'women'])) {
            $kategoris = Kategori::where('gender', $gender)->get();
            $produkQuery = Produk::whereIn('kategori_id', $kategoris->pluck('id'));
        } else {
            $kategoris = Kategori::all();
            $produkQuery = Produk::query();
        }

        $produks = $produkQuery
            ->where('nama_produk', 'LIKE', "%{$query}%")
            ->get();

        return view('produk.index', [
            'produks' => $produks,
            'kategoris' => $kategoris,
            'kategori' => null,
            'gender' => $gender
        ]);
    }


    // ===============================
    // 6. FILTER BERDASARKAN GENDER (PERBAIKAN)
    // ===============================
    public function byGender($gender)
    {
        // Ambil kategori sesuai gender
        $kategoris = Kategori::where('gender', $gender)->get();

        // Produk mengikuti kategori yang cocok dengan gender
        $produks = Produk::whereIn('kategori_id', $kategoris->pluck('id'))->get();

        return view('produk.index', compact('produks', 'kategoris', 'gender'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('transaksi', compact('produk'));
    }

    public function checkout($id)
    {
        $produk = Produk::findOrFail($id);

        return view('transaksi', compact('produk'));
    }


}
