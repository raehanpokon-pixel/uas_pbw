<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeStore</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
.best-seller {
    padding: 40px 20px;
    text-align: center;
}

.section-title {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 25px;
}

.best-seller-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 25px;
}

.product-card {
    background: #fff;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.product-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 10px;
}

.product-name {
    margin-top: 12px;
    font-size: 16px;
    font-weight: 600;
}

.product-price {
    font-size: 15px;
    margin-top: 4px;
    font-weight: 700;
    color: #5c2222;
}

.rating .star {
    color: #ccc;
    font-size: 18px;
}

.rating .star.active {
    color: gold;
}

/* =======================
   BEST SELLER SECTION (BESAR)
======================= */
.best-seller {
    padding: 40px 0;
    text-align: center;
}

.section-title {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 30px;
}

/* SCROLL CONTAINER */
.best-seller-scroll {
    display: flex;
    gap: 30px;
    overflow-x: auto;
    padding-bottom: 20px;
    scroll-behavior: smooth;
}

/* scrollbar */
.best-seller-scroll::-webkit-scrollbar {
    height: 10px;
}
.best-seller-scroll::-webkit-scrollbar-thumb {
    background: #c4a484;
    border-radius: 10px;
}

/* CARD LEBIH BESAR */
.product-card {
    min-width: 300px;            /* sebelumnya 240px */
    background: #fff;
    padding: 22px;
    border-radius: 18px;
    box-shadow: 0 5px 14px rgba(0,0,0,0.15);
    flex-shrink: 0;
    transition: 0.25s;
}

.product-card:hover {
    transform: translateY(-6px);
}

/* GAMBAR LEBIH BESAR */
.product-image {
    width: 100%;
    height: 260px;               /* sebelumnya 220px */
    object-fit: cover;
    border-radius: 14px;
}

/* NAMA PRODUK LEBIH BESAR */
.product-name {
    margin-top: 16px;
    font-size: 20px;
    font-weight: 600;
}

/* HARGA LEBIH BESAR */
.product-price {
    font-size: 19px;
    margin-top: 6px;
    font-weight: 700;
    color: #5c2222;
}

/* RATING */
.rating .star {
    color: #ccc;
    font-size: 22px;
}

.rating .star.active {
    color: gold;
}

</style>

</head>

<body class="bg-white">
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- =========================
        1. HERO SECTION
    ========================== -->
    <header class="relative w-full h-[450px] md:h-[500px]">
        <img src="<?php echo e($hero['image_url'] ?? 'https://via.placeholder.com/1500x500.png?text=Hero+Image'); ?>"
             alt="<?php echo e($hero['alt_text'] ?? 'New Collection'); ?>"
             class="w-full h-full object-cover">

        <div class="absolute inset-0 bg-black/30"></div>

        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 text-center text-white">
            <h2 class="text-2xl md:text-4xl font-light"><?php echo e($hero['title'] ?? 'New Brown Collection'); ?></h2>
            <h1 class="text-5xl md:text-7xl font-bold my-2"><?php echo e($hero['discount'] ?? '30% OFF'); ?></h1>

            <!-- ============ PERBAIKAN ADA DI SINI ============ -->
            <a href="<?php echo e(route('login')); ?>"
               class="inline-block bg-white text-black font-semibold px-8 py-2 rounded-lg mt-4 text-lg hover:bg-gray-200 transition">
                Get Now
            </a>
            <!-- ================================================= -->
        </div>
    </header>

    <main class="container mx-auto px-4 mt-8">

        <!-- =========================
            2. PROMO GRID 1
        ========================== -->
        <section class="grid grid-cols-2 md:grid-cols-4 grid-rows-2 gap-4 h-[600px] md:h-[500px]">
            <div class="col-span-1 row-span-2 rounded-lg overflow-hidden">
                <img src="<?php echo e($promoGrid1['boots']['image_url']); ?>"
                     alt="Boots" class="w-full h-full object-cover">
            </div>

            <div class="col-span-1 md:col-span-2 row-span-1 rounded-lg overflow-hidden">
                <img src="<?php echo e($promoGrid1['arrived']['image_url']); ?>"
                     alt="Arrived" class="w-full h-full object-cover">
            </div>

            <div class="col-span-1 row-span-1 flex flex-col gap-4">
                <div class="flex-1 rounded-lg overflow-hidden">
                    <img src="<?php echo e($promoGrid1['coupon1']['image_url']); ?>"
                         alt="Coupon 1" class="w-full h-full object-cover">
                </div>

                <div class="flex-1 rounded-lg overflow-hidden">
                    <img src="<?php echo e($promoGrid1['coupon2']['image_url']); ?>"
                         alt="Coupon 2" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="col-span-1 md:col-span-2 row-span-1 rounded-lg overflow-hidden">
                <img src="<?php echo e($promoGrid1['sale']['image_url']); ?>"
                     alt="Sale" class="w-full h-full object-cover">
            </div>

            <div class="col-span-1 row-span-1 rounded-lg overflow-hidden">
                <img src="<?php echo e($promoGrid1['style']['image_url']); ?>"
                     alt="Make Your Style" class="w-full h-full object-cover">
            </div>
        </section>

        <!-- =========================
            3. PROMO GRID 2
        ========================== -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
            <div class="md:col-span-2 relative rounded-lg overflow-hidden h-[500px] md:h-auto">
                <img src="<?php echo e($promoGrid2['heels']['image_url']); ?>"
                     alt="Heels" class="w-full h-full object-cover">

                <div class="absolute bottom-10 left-10 text-gray-800">
                    <h3 class="text-2xl font-serif italic"><?php echo e($promoGrid2['heels']['title']); ?></h3>
                    <p class="text-lg font-serif"><?php echo e($promoGrid2['heels']['subtitle']); ?></p>
                </div>
            </div>

            <div class="md:col-span-1 flex flex-col gap-4">
                <div class="rounded-lg overflow-hidden">
                    <img src="<?php echo e($promoGrid2['flats']['image_url']); ?>"
                         alt="Flats" class="w-full h-full object-cover">
                </div>

                <div class="rounded-lg overflow-hidden">
                    <img src="<?php echo e($promoGrid2['white_heels']['image_url']); ?>"
                         alt="White Heels" class="w-full h-full object-cover">
                </div>

                <div class="rounded-lg overflow-hidden">
                    <img src="<?php echo e($promoGrid2['dunk']['image_url']); ?>"
                         alt="Dunk Poster" class="w-full h-full object-cover">
                </div>
            </div>
        </section>


    <!-- BEST SELLER SECTION -->
    <section class="best-seller mt-12">
        <h2 class="section-title">Best Sellers</h2>

        <div class="best-seller-scroll">
            <?php $__currentLoopData = $bestSellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-card">

                <!-- GAMBAR PRODUK -->
                <img src="<?php echo e($item->image_url); ?>" 
                    alt="<?php echo e($item->nama_produk); ?>" 
                    class="product-image">

                <!-- NAMA PRODUK -->
                <h3 class="product-name">
                    <?php echo e($item->nama_produk); ?>

                </h3>

                <!-- ⭐ RATING (pindah ke atas harga) -->
                <div class="rating mt-2">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <span class="star <?php echo e($i <= ($item->rating ?? 0) ? 'active' : ''); ?>">★</span>
                    <?php endfor; ?>
                </div>

                <!-- 💰 HARGA (dipindah ke bawah rating) -->
                <p class="product-price mt-3">
                    Rp <?php echo e(number_format($item->harga, 0, ',', '.')); ?>

                </p>

                <!-- 🛒 TOMBOL BUY -->
                <a href="#"
                class="mt-4 block text-center bg-black text-white py-2 rounded-lg font-semibold hover:bg-blue-800 transition">
                Buy
                </a>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>


    </main>

    <!-- =========================
        5. FOOTER
    ========================== -->
    <footer class="bg-gray-800 text-gray-300 mt-16 py-12 px-4">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-2xl font-bold text-white mb-4">SHOESTORE</h3>
                <p>JALAN RUKOH, KEC. SYIAH KUALA,</p>
                <p>Kota Banda Aceh, Aceh</p>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Our Social Media</h4>
                <ul>
                    <li class="mb-2"><a href="#" class="hover:text-white">ShoeStore</a></li>
                    <li class="mb-2"><a href="#" class="hover:text-white">@shoestore.id</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Layanan Pelanggan</h4>
                <ul>
                    <li class="mb-2"><a href="#" class="hover:text-white">Pengiriman & Pelacakan</a></li>
                    <li class="mb-2"><a href="#" class="hover:text-white">Pengembalian & Penukaran</a></li>
                    <li class="mb-2"><a href="#" class="hover:text-white">Panduan Ukuran</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>
<?php /**PATH D:\uaspbw\resources\views/home.blade.php ENDPATH**/ ?>