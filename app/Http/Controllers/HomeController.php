<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View; // Pastikan View di-import
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama.
     */
    public function index(): View
    {
        // 1. Data untuk Hero Section (Gambar paling atas)
        $heroData = [
            // GANTI 'banner.jpg' dengan nama file Anda di 'public/gambar-home/'
            'image_url' => asset('gambar-home/banner.jpg.jpg'), 
            'alt_text' => 'New Brown Collection',
            'title' => 'New Brown Collection',
            'discount' => '30% OFF',
            'button_text' => 'Get Now',
            'button_link' => '/collection/new',
        ];

        // 2. Data untuk Grid Promosi 1
        $promoGrid1Data = [
            // PASTIKAN NAMA FILE INI ADA DI FOLDER 'public/gambar-home/'
            'boots' => ['image_url' => asset('gambar-home/boot.jpg')],
            'arrived' => ['image_url' => asset('gambar-home/arived.jpg.png')],
            'coupon1' => ['image_url' => asset('gambar-home/cupon 1.jpg.png')],
            'coupon2' => ['image_url' => asset('gambar-home/cupon 2.jpg.png')],
            'sale' => ['image_url' => asset('gambar-home/sale.jpg')],
            'style' => ['image_url' => asset('gambar-home/style.jpg.png')],
        ];
        
        // 3. Data untuk Grid Promosi 2
        $promoGrid2Data = [
            'heels' => [
                // PASTIKAN NAMA FILE INI ADA DI 'public/gambar-home/'
                'image_url' => asset('gambar-home/heels.jpg.png'),
                'title' => 'Step into your fairytale',
                'subtitle' => 'Every step is a whisper of elegance',
            ],
            // PASTIKAN NAMA FILE INI ADA DI 'public/gambar-home/'
            'flats' => ['image_url' => asset('gambar-home/flats.jpg.png')],
            'white_heels' => ['image_url' => asset('gambar-home/white heels.jpg.png')],
            'dunk' => ['image_url' => asset('gambar-home/dunk poster.jpg.png')],
        ];

        // 4. Data untuk Best Seller (Perbaikan Penting)
        // Memuat gambar dari 'storage/app/public/produk/'
        $bestSellerData = [
            (object)[
                'name' => 'Air Jordan 1',
                // GANTI NAMA FILE INI DENGAN NAMA FILE DI 'storage/app/public/produk/'
                'image_url' => asset('storage/produk/GkbWjZfK4Sj3qDSpWvRwVudADrWcZj.png'), 
                'rating' => 5,
                'price' => 3800000,
            ],
            (object)[
                'name' => 'Air Force 1',
                // GANTI NAMA FILE INI DENGAN NAMA FILE DI 'storage/app/public/produk/'
                'image_url' => asset('storage/produk/JTwYMzxF7cYbU37nvKqj7qWwD1qYhL.jpg'), 
                'rating' => 5,
                'price' => 3500000,
            ],
            (object)[
                'name' => 'Dunk',
                // GANTI NAMA FILE INI DENGAN NAMA FILE DI 'storage/app/public/produk/'
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