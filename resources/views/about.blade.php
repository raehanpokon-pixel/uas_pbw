<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeStore — About</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        /* Definisi variabel warna untuk kemudahan */
        :root {
            --accent-color: #00FFFF; /* Warna aksen Teal/Cyan yang cerah */
            --bg-overlay: rgba(0, 0, 0, 0.75);
            --text-color: #f0f0f0;
        }

        /* Gaya Dasar */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://images.unsplash.com/photo-1534126511673-b6899657816a');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: var(--text-color);
            line-height: 1.6; /* Sedikit mengatur ulang line-height untuk body */
        }

        /* Overlay Gelap */
        .overlay {
            background: var(--bg-overlay);
            padding: 40px 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        /* Container dengan Frosted Glass Effect */
        .content-container {
            max-width: 900px;
            width: 100%;
            margin-top: 60px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(8px); /* Blur sedikit lebih kuat */
            border: 1px solid rgba(255, 255, 255, 0.1); /* Garis tepi semi-transparan */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Efek transisi untuk interaksi */
        }
        
        /* Efek Hover (opsional, untuk meniru interaktivitas) */
        .content-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 255, 255, 0.4); /* Bayangan neon cerah */
        }

        /* Keyframes untuk Animasi Judul */
        @keyframes pulseBorder {
            0% { border-color: rgba(0, 255, 255, 0.3); }
            50% { border-color: var(--accent-color); }
            100% { border-color: rgba(0, 255, 255, 0.3); }
        }

        /* Gaya Judul Utama */
        h1 {
            font-size: 3.5em;
            font-weight: 700;
            color: #ffffff;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 0 0 15px var(--accent-color); /* Text-shadow warna aksen */
            border-bottom: 3px solid rgba(0, 255, 255, 0.3);
            padding-bottom: 10px;
            animation: pulseBorder 3s infinite alternate; /* Menerapkan animasi */
        }

        /* Gaya Konten Teks */
        .content {
            font-size: 1.15em;
            line-height: 1.8;
            text-align: justify;
            font-weight: 300;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.9);
        }

        /* Drop Cap (Huruf Pertama Lebih Besar) */
        .content p:first-child::first-letter {
            float: left;
            font-size: 3.5em; /* Dibuat sedikit lebih besar */
            line-height: 1;
            padding-right: 10px;
            font-weight: 600;
            color: var(--accent-color); /* Menggunakan warna aksen */
            text-shadow: 0 0 5px rgba(0, 255, 255, 0.7);
        }

        /* Style untuk paragraf dalam konten */
        .content p {
            margin-bottom: 1.5em;
        }

        /* Efek Neon pada tautan/tombol (jika Anda menambahkannya nanti) */
        .neon-link {
            color: var(--accent-color);
            text-decoration: none;
            transition: color 0.3s ease, text-shadow 0.3s ease;
        }

        .neon-link:hover {
            color: #ffffff;
            text-shadow: 0 0 10px var(--accent-color);
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <div class="overlay">
        <div class="content-container">
            <h1>Tentang ShoeStore</h1>
            <div class="content">
                <p>Website ini merupakan tempat terbaik bagi anda yang mencari sepatu **berkualitas**
                untuk pria dan wanita dengan desain modern dan bahan pilihan. Setiap produk dibuat
                dengan memperhatikan detail, mulai dari **kenyamanan langkah** hingga ketahanan bahan
                agar bisa digunakan dalam berbagai aktivitas sehari-hari. Koleksi kami mencakup
                berbagai gaya dari sneakers kasual hingga sepatu sporty — yang dirancang untuk menyesuaikan
                dengan karakter dan kebutuhan setiap pelanggan.</p>

                <p>Selain menawarkan kualitas unggul, kami juga berkomitmen memberikan **harga yang pantas** dan
                bersahabat. Dengan sistem pembelian online yang mudah dan pelayanan ramah, kami ingin
                memastikan setiap pelanggan merasa puas sejak memilih hingga menerima produk di tangan.
                Di sini, anda tidak hanya membeli sepatu, tetapi juga mendapatkan pengalaman berbelanja
                yang nyaman dan menyenangkan. Jika Anda ingin melihat koleksi kami, silakan cek <a href="#" class="neon-link">halaman Produk</a> kami.</p>
            </div>
        </div>
    </div>
</body>
</html>