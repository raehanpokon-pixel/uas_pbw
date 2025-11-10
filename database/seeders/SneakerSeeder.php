<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sneaker;

class SneakerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Aether Runner', 'image' => 'sneakers/aether.jpg', 'price' => 3800000, 'rating' => 5],
            ['name' => 'Heritage Trainer', 'image' => 'sneakers/heritage.jpg', 'price' => 3500000, 'rating' => 4.5],
            ['name' => 'Shadow Lite', 'image' => 'sneakers/shadow.jpg', 'price' => 2900000, 'rating' => 4.5],
            ['name' => 'White Core Sneaker', 'image' => 'sneakers/whitecore.jpg', 'price' => 1380000, 'rating' => 4],
        ];

        foreach ($data as $s) {
            Sneaker::create($s);
        }
    }
}
