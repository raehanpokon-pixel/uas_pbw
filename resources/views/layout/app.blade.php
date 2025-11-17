<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ShoeStore')</title>

    {{-- Memuat Tailwind CSS via CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Script untuk Ikon (Lucide Icons) --}}
    <script src="https://cdn.jsdelivr.net/npm/lucide-icons@latest/dist/lucide.min.js"></script>

    <style>
        /* Anda bisa tambahkan custom CSS di sini jika perlu */
        body {
            /* Warna latar belakang umum, bisa disesuaikan */
            background-color: #f9fafb; /* Latar belakang abu-abu sangat muda */
        }
    </style>
</head>
<body class="font-sans">

    {{-- ====================================================== --}}
    {{-- HEADER / NAVIGASI --}}
    {{-- ====================================================== --}}
    <header class="bg-[#1F2937] text-white shadow-md">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            {{-- Logo --}}
            <a href="/" class="text-3xl font-bold text-white">
                ShoeStore
            </a>

            {{-- Navigasi (Desktop) --}}
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="hover:text-gray-300">ABOUT</a>
                <span class="text-gray-500">·</span>
                <a href="#" class="hover:text-gray-300">COLLECTIONS</a>
                <span class="text-gray-500">·</span>
                <a href="#" class="hover:text-gray-300">SHOP</a>
                <span class="text-gray-500">·</span>
                <a href="#" class="hover:text-gray-300">CONTACT</a>
            </div>

            {{-- Ikon (Desktop) --}}
            <div class="hidden md:flex items-center space-x-5">
                <a href="#" class="hover:text-gray-300">
                    <i data-lucide="search" class="w-5 h-5"></i>
                </a>
                <a href="#" class="hover:text-gray-300">
                    <i data-lucide="heart" class="w-5 h-5"></i>
                </a>
                <a href="#" class_exists="hover:text-gray-300">
                    <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                </a>
                <a href="#" class="hover:text-gray-300">
                    <i data-lucide="user" class="w-5 h-5"></i>
                </a>
            </div>

            {{-- Tombol Menu (Mobile) --}}
            <div class="md:hidden">
                <button class="text-white">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </nav>
    </header>

    {{-- ====================================================== --}}
    {{-- KONTEN HALAMAN UTAMA --}}
    {{-- ====================================================== --}}
    <main>
        @yield('content')
    </main>

    {{-- ====================================================== --}}
    {{-- FOOTER --}}
    {{-- ====================================================== --}}
    <footer class="bg-[#1F2937] text-gray-300 py-12">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Kolom 1: Info Toko --}}
            <div>
                <h3 class="text-2xl font-bold text-white mb-4">ShoeStore</h3>
                <p class="mb-2">Jl. T. Panglima Polem No.12,</p>
                <p class="mb-2">KOTA BANDA ACEH, ACEH</p>
                <p>Indonesia</p>
            </div>

            {{-- Kolom 2: Media Sosial --}}
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Our Social Media</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">Facebook</a></li>
                    <li><a href="#" class="hover:text-white">Twitter</a></li>
                    <li><a href="#" class="hover:text-white">Instagram - @ShoeStore.id</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Layanan Pelanggan --}}
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Layanan Pelanggan</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">Pengiriman & Pelacakan</a></li>
                    <li><a href="#" class="hover:text-white">Pengembalian & Penukaran</a></li>
                    <li><a href="#" class="hover:text-white">Panduan Ukuran</a></li>
                </ul>
            </div>
        </div>
        <div class="container mx-auto px-6 text-center mt-8 border-t border-gray-700 pt-6">
            <p class="text-sm">&copy; {{ date('Y') }} ShoeStore. All rights reserved.</p>
        </div>
    </footer>

    {{-- Script untuk mengaktifkan ikon Lucide --}}
    <script>
      lucide.createIcons();
    </script>

</body>
</html>