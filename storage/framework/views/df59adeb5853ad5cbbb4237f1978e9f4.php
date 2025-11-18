<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeStore — About</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://images.unsplash.com/photo-1534126511673-b6899657816a');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.60);
            padding: 60px 80px;
            min-height: 100vh;
        }
      .content {
            font-size: 30px;
            line-height: 1.9;
            text-align: justify;
            margin-top: 40px;
            font-weight: 400;
        }



        .content::first-letter {
            margin-left: 30px;
        }
    </style>
</head>

<body>
     <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="overlay">
        <div class="content">
            Website ini merupakan tempat terbaik bagi anda yang mencari sepatu berkualitas
            untuk pria dan wanita dengan desain modern dan bahan pilihan. Setiap produk dibuat
            dengan memperhatikan detail, mulai dari kenyamanan langkah hingga ketahanan bahan
            agar bisa digunakan dalam berbagai aktivitas sehari-hari. Koleksi kami mencakup
            berbagai gaya dari sneakers kasual hingga sepatu sporty — yang dirancang untuk menyesuaikan
            dengan karakter dan kebutuhan setiap pelanggan.<br><br>

            Selain menawarkan kualitas unggul, kami juga berkomitmen memberikan harga yang pantas dan
            bersahabat. Dengan sistem pembelian online yang mudah dan pelayanan ramah, kami ingin
            memastikan setiap pelanggan merasa puas sejak memilih hingga menerima produk di tangan.
            Di sini, anda tidak hanya membeli sepatu, tetapi juga mendapatkan pengalaman berbelanja
            yang nyaman dan menyenangkan.
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\uaspbw\resources\views/about.blade.php ENDPATH**/ ?>