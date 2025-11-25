<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeStore</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
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
            <a href="<?php echo e(route('produk.index')); ?>"
   class="inline-block bg-white text-black font-semibold px-8 py-2 rounded-lg mt-4 text-lg hover:bg-gray-200 transition">
    Get Now
</a>

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

        <!-- =========================
            4. BEST SELLERS
        ========================== -->
        <section class="mt-16">
            <h2 class="text-3xl font-bold text-center mb-8">Best Seller</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php $__empty_1 = true; $__currentLoopData = $bestSellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="border border-gray-200 rounded-lg shadow-md overflow-hidden bg-gray-50">
                        <div class="bg-gray-200 h-64">
                            <img src="<?php echo e($product->image_url); ?>"
                                 alt="<?php echo e($product->name); ?>"
                                 class="w-full h-full object-cover">
                        </div>

                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800"><?php echo e($product->name); ?></h3>

                            <div class="flex items-center my-2">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <svg class="w-5 h-5 <?php echo e($i <= $product->rating ? 'text-yellow-400' : 'text-gray-300'); ?>"
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.957a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.368 2.446a1 1 0 00-.364 1.118l1.287 3.957c.3.921-.755 1.688-1.54 1.118l-3.368-2.446a1 1 0 00-1.176 0l-3.368 2.446c-.784.57-1.838-.197-1.54-1.118l1.287-3.957a1 1 0 00-.364-1.118L2.06 9.384c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69L9.049 2.927z"></path>
                                    </svg>
                                <?php endfor; ?>

                                <span class="ml-2 text-gray-500 text-sm">(<?php echo e($product->rating); ?>)</span>
                            </div>

                            <p class="text-xl font-bold text-gray-900 mb-4">
                                Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?>

                            </p>

                            <a href="#"
                               class="w-full text-center block bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                                Buy
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="col-span-3 text-center text-gray-500">
                        Produk best seller belum tersedia.
                    </p>
                <?php endif; ?>
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
                <p>KOTA BANDA ACEH, ACEH</p>
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
                    <li class="mb-2"><a href="#" class="hover:text-white">Pengiriman & Kelacakan</a></li>
                    <li class="mb-2"><a href="#" class="hover:text-white">Pengembalian & Penukaran</a></li>
                    <li class="mb-2"><a href="#" class="hover:text-white">Panduan Ukuran</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>
<?php /**PATH E:\uas_pbw\resources\views/home.blade.php ENDPATH**/ ?>