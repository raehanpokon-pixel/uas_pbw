<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeStore</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        html, body { height: 100%; margin: 0; padding: 0; }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #d9b597;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main { flex: 1; }

        /* CATEGORY BAR */
        .category-bar {
            background-color: #f5e3d2;
            padding: 10px 20px;
            display: grid;
            grid-template-columns: 200px 1fr 200px;
            align-items: center;
        }

        .gender-section select {
            padding: 8px 20px;
            border: 2px solid #5c2222;
            border-radius: 20px;
            background-color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #5c2222;
            cursor: pointer;
        }

        .category-wrapper {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .category-wrapper a {
            text-decoration: none;
            color: #5c2222;
            padding: 8px 20px;
            border: 2px solid #5c2222;
            border-radius: 20px;
            transition: 0.3s;
        }

        .category-wrapper a.active,
        .category-wrapper a:hover {
            background-color: #5c2222;
            color: white;
        }

        /* TITLE SECTION */
        .page-title-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px 40px 10px 40px;
        }
        .page-title-section h2 {
            font-size: 24px;
            font-weight: 700;
            margin: 0 15px;
            background-color: #d9b597;
            padding: 0 12px;
            color: #4a3f35;
        }

        .triple-line {
            flex-grow: 1;
            height: 2px;
            background-color: #3a2f2a;
            position: relative;
        }
        .triple-line::before,
        .triple-line::after {
            content: "";
            position: absolute;
            left: 0; right: 0;
            height: 1px;
            background-color: #6b5045;
            width: 80%;
            margin: 0 auto;
        }
        .triple-line::before { top: -6px; }
        .triple-line::after { bottom: -6px; }

        /* PRODUCT GRID */
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 0 15px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #e6d2be;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
        }

        .product-image-box {
            background: linear-gradient(to bottom, #f9ceb3, #f7e9dd);
            padding: 12px;
            border-radius: 12px;
            min-height: 220px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .product-image {
            width: 95%;
            height: 150px;
            object-fit: contain;
            margin-bottom: 30px;
        }

        .product-name {
            font-weight: 600;
            font-size: 16px;
            color: #4a3f35;
            position: absolute;
            bottom: 0;
            background-color: transparent;
            width: 100%;
            padding: 10px 0;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        .product-rating {
            color: #f4c430;
            font-size: 18px;
            margin: 15px 0 8px 0;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 5px;
        }

        .heart {
            font-size: 28px;
            color: white;
            -webkit-text-stroke: 2px #00000040;
        }

        .price {
            font-family: 'Times New Roman', serif;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .buy-btn {
            background-color: #4a89f3;
            color: white;
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: bold;
            font-family: 'Times New Roman';
            text-decoration: none;
        }
        .buy-btn:hover { background-color: #3570d6; }

        /* BEST SELLER */
        .best-seller-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 10px 20px;
        }

        .best-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #4a3f35;
        }

        .best-scroll {
            display: flex;
            overflow-x: auto;
            gap: 15px;
            padding-bottom: 10px;
            scroll-snap-type: x mandatory;
        }

        .best-scroll::-webkit-scrollbar { height: 8px; }
        .best-scroll::-webkit-scrollbar-thumb {
            background: #b08b6e; border-radius: 20px;
        }

        .best-card {
            min-width: 220px;
            background-color: #e6d2be;
            padding: 15px;
            border-radius: 15px;
            text-align: center;
            flex-shrink: 0;
            scroll-snap-align: start;
        }

        .best-image-box {
            background: linear-gradient(to bottom, #f9ceb3, #f7e9dd);
            padding: 10px;
            border-radius: 12px;
        }

        .best-image {
            width: 100%;
            height: 140px;
            object-fit: contain;
        }

        footer {
            background-color: #5c2222;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
        }
    </style>
</head>

<body>

@include('layouts.navbar')

<main>

    <!-- CATEGORY -->
    <div class="category-bar">

        <div class="gender-section">
            <select onchange="window.location.href=this.value">
                <option value="{{ route('produk.index') }}" {{ !isset($gender) ? 'selected' : '' }}>Semua Gender</option>
                <option value="{{ route('produk.gender', 'men') }}" {{ (isset($gender) && $gender == 'men') ? 'selected' : '' }}>Men</option>
                <option value="{{ route('produk.gender', 'women') }}" {{ (isset($gender) && $gender == 'women') ? 'selected' : '' }}>Women</option>
            </select>
        </div>

        <div class="category-wrapper">
            @foreach($kategoris as $k)
                @php
                    if (isset($gender) && $k->gender !== $gender) continue;
                    $adaProduk = $k->produk()->exists();
                @endphp

                @if($adaProduk)
                    <a href="{{ route('produk.byKategori', $k->id) }}{{ isset($gender) ? '?gender='.$gender : '' }}"
                        class="{{ isset($kategori) && $kategori->id == $k->id ? 'active' : '' }}">
                        {{ $k->nama_kategori }}
                    </a>
                @endif
            @endforeach
        </div>

    </div>

    <!-- TITLE -->
    <div class="page-title-section">
        <div class="triple-line"></div>

        <h2>
            @if(isset($kategori))
                {{ $kategori->nama_kategori }}
            @elseif(isset($gender))
                {{ ucfirst($gender) }}'s Products
            @else
                Semua Produk
            @endif
        </h2>

        <div class="triple-line"></div>
    </div>

    <!-- PRODUCT GRID -->
    <div class="container">
        <div class="grid">
            @forelse($produks as $p)
            <div class="card">

                <div class="product-image-box">
                    <img src="{{ asset('storage/' . $p->foto) }}" class="product-image" alt="{{ $p->nama_produk }}">
                    <div class="product-name"><b>{{ $p->nama_produk }}</b></div>
                </div>

                <div class="product-rating">★★★★★</div>

                <div class="product-footer">
                    <span class="heart">♡</span>

                    <span class="price">
                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                    </span>

                    <a href="{{ route('checkout', $p->id) }}" class="buy-btn">Buy</a>
                </div>
            </div>

            @empty
                <p>Tidak ada produk tersedia.</p>
            @endforelse

        </div>
    </div>

   

</main>

<footer>
    © 2025 ShoeStore. All rights reserved.
</footer>

</body>
</html>
