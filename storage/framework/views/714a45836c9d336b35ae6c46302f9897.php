<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeStore</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* RESET */
        html, body { height: 100%; margin: 0; padding: 0; }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #d9b597;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main { flex: 1; }

        /* CATEGORY */
        .category-bar {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            background-color: #f5e3d2;
            padding: 10px 40px;
            align-items: center;
        }

        .category-bar a {
            text-decoration: none;
            color: #5c2222;
            padding: 8px 20px;
            border: 2px solid #5c2222;
            border-radius: 20px;
            transition: 0.3s;
        }
        .category-bar a.active,
        .category-bar a:hover {
            background-color: #5c2222;
            color: white;
        }

        /* ⭐ TRIPLE LINE FINAL ⭐ */
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
            z-index: 3;
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

        /* CARD */
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
            position: relative;
        }

        .product-image-box {
            background: linear-gradient(to bottom, #f9ceb3, #f7e9dd);
            padding: 12px;
            border-radius: 12px;
            min-height: 220px; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative; 
            overflow: hidden;
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
            left: 0;
            right: 0;
            width: 100%;
            background-color: white; 
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
            font-family: 'Times New Roman', serif;
            text-decoration: none;
        }
        .buy-btn:hover {
            background-color: #3570d6;
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

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main>
    <div class="category-bar">
        <select onchange="window.location.href=this.value"
            style="padding: 8px 20px; border: 2px solid #5c2222; border-radius: 20px; background-color: #ffffff; font-family: 'Poppins', sans-serif; font-size: 14px; color: #5c2222; cursor: pointer; outline: none;">
            <option value="<?php echo e(route('produk.index')); ?>" <?php echo e(!isset($gender) ? 'selected' : ''); ?>>Semua Gender</option>
            <option value="<?php echo e(route('produk.gender', 'men')); ?>" <?php echo e((isset($gender) && $gender == 'men') ? 'selected' : ''); ?>>Men</option>
            <option value="<?php echo e(route('produk.gender', 'women')); ?>" <?php echo e((isset($gender) && $gender == 'women') ? 'selected' : ''); ?>>Women</option>
        </select>

        <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if (isset($gender) && $k->gender !== $gender) continue;
                $adaProduk = $k->produk()->exists();
            ?>

            <?php if($adaProduk): ?>
                <a href="<?php echo e(route('produk.byKategori', $k->id)); ?><?php echo e(isset($gender) ? '?gender='.$gender : ''); ?>"
                    class="<?php echo e(isset($kategori) && $kategori->id == $k->id ? 'active' : ''); ?>">
                    <?php echo e($k->nama_kategori); ?>

                </a>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- 🔥 TRIPLE LINE TITLE FINAL -->
    <div class="page-title-section">
        <div class="triple-line"></div>

        <h2>
            <?php if(isset($kategori)): ?>
                <?php echo e($kategori->nama_kategori); ?>

            <?php elseif(isset($gender)): ?>
                <?php echo e(ucfirst($gender)); ?>'s Products
            <?php else: ?>
                Semua Produk
            <?php endif; ?>
        </h2>

        <div class="triple-line"></div>
    </div>

    <div class="container">
        <div class="grid">
            <?php $__empty_1 = true; $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card">

                <div class="product-image-box">
                    <img src="<?php echo e(asset('storage/' . $p->foto)); ?>"
                        class="product-image"
                        alt="<?php echo e($p->nama_produk); ?>">
                    
                    <div class="product-name">
                        <b><?php echo e($p->nama_produk); ?></b>
                    </div>
                </div>

                <div class="product-rating">★★★★★</div>

                <div class="product-footer">
                    <span class="heart">♡</span>

                    <span class="price">
                        Rp <?php echo e(number_format($p  ->harga, 0, ',', '.')); ?>

                    </span>

                    <a href="#" class="buy-btn">Buy</a>
                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>Tidak ada produk tersedia.</p>
            <?php endif; ?>

        </div>
    </div>
</main>

<footer>
    © 2025 ShoeStore. All rights reserved.
</footer>

</body>
</html>
<?php /**PATH D:\uaspbw\resources\views/produk/index.blade.php ENDPATH**/ ?>