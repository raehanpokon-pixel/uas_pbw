<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | ShoeStore</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #d4ab89;
            color: #4b1e1e;
        }

        .contact-section {
            display: flex;
            justify-content: space-between;
            padding: 60px 10%;
            background-color: #deb796;
            flex-wrap: wrap;
        }

        .contact-info, .contact-form {
            flex: 1;
            min-width: 300px;
            margin: 20px;
        }

        .contact-info h2,
        .contact-form h2 {
            font-size: 26px;
            margin-bottom: 15px;
        }

        .contact-info ul {
            list-style: none;
            padding: 0;
        }

        .contact-info li {
            margin: 10px 0;
        }

        .contact-info a {
            color: #4b1e1e;
            font-weight: 600;
            text-decoration: none;
        }

        .contact-form input,
        .contact-form textarea {
            border: none;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 15px;
            background-color: #fff8f2;
        }

        .contact-form button {
            background-color: #5a2a2a;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
        }

        footer {
            background-color: #4b1e1e;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 40px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- CONTACT CONTENT -->
    <section class="contact-section">
        <div class="contact-info">
            <h2>Kunjungi Kami</h2>
            <p>
                Jalan Rukoh, Kec. Syiah Kuala,<br>
                Kota Banda Aceh, Aceh
            </p>

            <h3>Ikuti Kami</h3>
            <ul>
                <li><i class="bi bi-instagram"></i> Instagram: <a href="#">@ShoeStore</a></li>
                <li><i class="bi bi-tiktok"></i> TikTok: <a href="#">@ShoeStore.id</a></li>
                <li><i class="bi bi-envelope-fill"></i> Email: <a href="mailto:contact@shoestore.id">contact@shoestore.id</a></li>
            </ul>
        </div>

        <div class="contact-form">
            <h2>Kirim Pesan</h2>
            <form onsubmit="event.preventDefault(); alert('Pesan berhasil dikirim (demo)!');">
                <input type="text" placeholder="Nama Anda" required>
                <input type="email" placeholder="Email Anda" required>
                <textarea rows="5" placeholder="Tulis pesan Anda..." required></textarea>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </section>

    <footer>
        © 2025 ShoeStore — Koleksi Sepatu Premium Indonesia
    </footer>

</body>
</html>
<?php /**PATH E:\uas_pbw\resources\views/contact.blade.php ENDPATH**/ ?>