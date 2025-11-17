<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View; // Pastikan View di-import

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama.
     */
    public function index(): View
    {
        // 1. Data untuk Hero Section (Gambar paling atas)
        $heroData = [
            // Saya gunakan 'image1.jpg' dari screenshot Anda sebagai contoh
            'image_url' => 'https://images.unsplash.com/photo-1606813902770-ad8309826d33',
            'alt_text' => 'New Brown Collection',
            'title' => 'New Brown Collection',
            'discount' => '30% OFF',
            'button_text' => 'Get Now',
            'button_link' => '/collection/new',
        ];

        // 2. Data untuk Grid Promosi 1
        $promoGrid1Data = [
            // PASTIKAN NAMA FILE INI (misal: 'promo-boots.jpg') ADA DI DALAM FOLDER 'public/home/' ANDA
            'boots' => ['image_url' => asset('home/promo-boots.jpg')],
            'arrived' => ['image_url' => asset('home/promo-arrived.jpg')], // Ini sudah benar menurut terminal Anda
            'coupon1' => ['image_url' => asset('home/promo-coupon1.jpg')], // Ini sudah benar
            'coupon2' => ['image_url' => asset('home/promo-coupon2.jpg')], // Ini sudah benar
            'sale' => ['image_url' => asset('home/promo-sale.jpg')],     // Ini sudah benar
            'style' => ['image_url' => asset('home/promo-style.jpg')],
        ];
        
        // 3. Data untuk Grid Promosi 2
        $promoGrid2Data = [
            'heels' => [
                // PASTIKAN NAMA FILE INI ADA DI 'public/home/'
                'image_url' => asset('home/promo-heels.jpg'),
                'title' => 'Step into your fairytale',
                'subtitle' => 'Every step is a whisper of elegance',
            ],
            // PASTIKAN NAMA FILE INI ADA DI 'public/home/'
            'flats' => ['image_url' => asset('home/promo-flats.jpg')],
            'white_heels' => ['image_url' => asset('home/promo-white-heels.jpg')],
            'dunk' => ['image_url' => asset('home/promo-dunk-poster.jpg')],
        ];

        // 4. Data untuk Best Seller (Perbaikan Penting)
        // Sekarang memuat gambar dari 'public/storage/produk/'
        $bestSellerData = [
            (object)[
                'name' => 'Air Jordan 1',
                // Saya ambil nama file 'GkbW...' dari screenshot folder 'produk' Anda sebagai contoh
                'image_url' => asset('storage/produk/GkbWjZfK4Sj3qDSpWvRwVudADrWcZj.png'), 
                'rating' => 5,
                'price' => 3800000,
            ],
            (object)[
                'name' => 'Air Force 1',
                // Saya ambil nama file 'JTwY...' dari screenshot folder 'produk' Anda sebagai contoh
                'image_url' => asset('storage/produk/JTwYMzxF7cYbU37nvKqj7qWwD1qYhL.jpg'), 
                'rating' => 5,
                'price' => 3500000,
            ],
            (object)[
                'name' => 'Dunk',
                // Saya ambil nama file 'LswX...' dari screenshot folder 'produk' Anda sebagai contoh
                'image_url' => asset('storage/produk/LswXqf5jm8WnC5WnFMTwGuZoUhWcVGlsc.png'), 
                'rating' => 4,
                'price' => 2900000,
            ],
        ];

        // 5. Kirim semua data ke view 'home'
        return view('home', [
            'hero' => $heroData,
            'promoGrid1' => $promoGrid1Data,
            'promoGrid2' => $promoGrid2Data,
            'bestSellers' => $bestSellerData, 
        ]);
    }
}