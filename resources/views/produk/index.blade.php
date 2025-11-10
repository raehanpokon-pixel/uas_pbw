<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* --- RESET DAN DASAR --- */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #d9b597;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1; /* isi utama akan mengisi ruang kosong di atas footer */
        }

        /* --- HEADER --- */
        header {
            background-color: #5c2222;
            color: white;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-weight: 700;
            font-size: 1.5rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: 500;
            transition: 0.3s;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* --- KATEGORI --- */
        .category-bar {
            display: flex;
            justify-content: center;
            gap: 20px;
            background-color: #f5e3d2;
            padding: 10px 0;
        }

        .category-bar a {
            text-decoration: none;
            color: #5c2222;
            padding: 8px 20px;
            border: 2px solid #5c2222;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .category-bar a.active,
        .category-bar a:hover {
            background-color: #5c2222;
            color: white;
        }

        /* --- KONTEN --- */
        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #5c2222;
            margin-bottom: 30px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #f8ebe1;
            border-radius: 15px;
            padding: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .card h3 {
            color: #4a1f1f;
            margin: 10px 0 5px;
            font-size: 1.1rem;
        }

        .price {
            font-weight: bold;
            color: #3b1a1a;
        }

        /* --- ALERT --- */
        .alert {
            background-color: #c9e6c9;
            color: #2b4b2b;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        /* --- FOOTER --- */
        footer {
            background-color: #5c2222;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto; /* menjaga agar selalu di bawah */
        }

        .card {
    position: relative;
}

/* Rating */
.rating {
    color: #e8b100;
    font-size: 18px;
    margin: 6px 0;
}

/* Harga dan tombol buy */
.price-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Tombol Buy */
.buy-btn {
    background-color: #5c8ef2;
    border: none;
    border-radius: 8px;
    padding: 5px 12px;
    color: white;
    cursor: pointer;
    font-size: 0.8rem;
}

/* Heart wishlist */
.wishlist {
    position: absolute;
    bottom: 12px;
    left: 12px;
    font-size: 20px;
    color: #b14f4f;
    cursor: pointer;
    user-select: none;
}

    </style>
</head>
<body>

    @include('layouts.navbar')


    <main>
        <div class="category-bar">
            @foreach($kategoris as $k)
                <a href="{{ route('produk.byKategori', $k->id) }}" 
                   class="{{ isset($kategori) && $kategori->id == $k->id ? 'active' : '' }}">
                    {{ $k->nama_kategori }}
                </a>
            @endforeach
        </div>

        <div class="container">
            @if(session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            <h1>{{ isset($kategori) ? $kategori->nama_kategori : 'Semua Produk' }}</h1>

            <div class="grid">
               @forelse($produks as $p)
<div class="card">
    @if($p->foto)
        <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama_produk }}">
    @else
        <img src="https://via.placeholder.com/250x180?text=No+Image" alt="No Image">
    @endif

    <h3>{{ $p->nama_produk }}</h3>

    <!-- Rating -->
    <div class="rating">
        ★★★★☆
    </div>

    <!-- Harga + tombol buy -->
    <div class="price-row">
        <span class="price">Rp {{ number_format(rand(1000000, 4000000), 0, ',', '.') }}</span>
        <button class="buy-btn">Buy</button>
    </div>

    <!-- Wishlist -->
    <span class="wishlist">♡</span>
</div>
@empty
    <p style="text-align:center; color:#5c2222;">Belum ada produk di kategori ini.</p>
@endforelse

            </div>
        </div>
    </main>

    <footer>
        <p>© 2025 ShoeStore — Koleksi Sepatu Premium Indonesia</p>
    </footer>
</body>
</html>
