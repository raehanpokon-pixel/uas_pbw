<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        // 1. Hero Section
        $heroData = [
            'image_url'   => asset('gambar-home/banner.jpg.jpg'),
            'alt_text'    => 'New Brown Collection',
            'title'       => 'New Brown Collection',
            'discount'    => '30% OFF',
            'button_text' => 'Get Now',
            'button_link' => '/collection/new',
        ];

        // 2. Promo Grid 1
        $promoGrid1Data = [
            'boots'     => ['image_url' => asset('gambar-home/boot.jpg')],
            'arrived'   => ['image_url' => asset('gambar-home/arived.jpg.png')],
            'coupon1'   => ['image_url' => asset('gambar-home/cupon 1.jpg.png')],
            'coupon2'   => ['image_url' => asset('gambar-home/cupon 2.jpg.png')],
            'sale'      => ['image_url' => asset('gambar-home/sale.jpg')],
            'style'     => ['image_url' => asset('gambar-home/style.jpg.png')],
        ];

        // 3. Promo Grid 2
        $promoGrid2Data = [
            'heels' => [
                'image_url' => asset('gambar-home/heels.jpg.png'),
                'title'     => 'Step into your fairytale',
                'subtitle'  => 'Every step is a whisper of elegance',
            ],
            'flats'       => ['image_url' => asset('gambar-home/flats.jpg.png')],
            'white_heels' => ['image_url' => asset('gambar-home/white heels.jpg.png')],
            'dunk'        => ['image_url' => asset('gambar-home/dunk poster.jpg.png')],
        ];

        // 4. Ambil 7 produk pertama dari database
        $bestSellerData = Produk::orderBy('id', 'ASC')->take(7)->get();

        // Jika produk kurang dari 7 → tambahkan dummy
        while ($bestSellerData->count() < 7) {
            $bestSellerData->push((object)[
                'nama_produk' => 'Coming Soon',
                'foto'        => 'default.png',
                'rating'      => 0,
                'harga'       => 0,
                'image_url'   => asset('storage/produk/default.png'),
            ]);
        }

        // Mapping agar image_url otomatis benar
        $bestSellerData = $bestSellerData->map(function ($p) {
            $p->image_url = asset('storage/' . $p->foto);
            return $p;
        });

        // Kirim data ke view
        return view('home', [
            'hero'         => $heroData,
            'promoGrid1'   => $promoGrid1Data,
            'promoGrid2'   => $promoGrid2Data,
            'bestSellers'  => $bestSellerData,
        ]);
    }
}
