<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeStore - Create Account</title>
    
    {{-- LINK FONT AWESOME UNTUK ICON --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* CSS untuk mempertahankan desain dan background */
        body {
            /* PENTING: GANTI URL_GAMBAR_BACKGROUND DENGAN PATH KE GAMBAR SEPATU ANDA */
            /* Contoh: background-image: url('{{ asset('images/shoes_background.jpg') }}'); */
            background-image: url("{{ asset('gambar-home/register.jpg') }}"); /* Placeholder sementara */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Styling Navbar */
        .navbar {
            background-color: #791a27; /* Merah marun */
            padding: 10px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            border-bottom: 2px solid #5a141d;
        }

        .navbar-logo {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar-links a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
        }

        .navbar-icons a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 18px; 
        }

        /* Main Content dan Box Form */
        .main-content {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 0;
        }

        .register-box {
            background-color: rgba(0, 0, 0, 0.4); /* Overlay transparan gelap */
            backdrop-filter: blur(8px); /* Efek blur yang lebih kuat */
            padding: 40px 50px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6); /* Shadow lebih menonjol */
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative; /* Untuk positioning judul */
        }

        .register-box h2 {
            color: white;
            font-size: 30px;
            margin-bottom: 30px; /* Jarak bawah judul */
            font-weight: 500;
            position: relative;
            z-index: 1; /* Pastikan di atas elemen lain jika ada tumpang tindih */
        }

        /* Styling Input Field */
        .input-group {
            margin-bottom: 20px; /* Jarak antar input field */
            position: relative;
        }

        .input-group input {
            width: calc(100% - 40px); /* Kurangi lebih banyak untuk padding + icon */
            padding: 15px;
            padding-left: 45px; /* Ruang untuk ikon */
            border: none; /* Hilangkan border asli */
            border-radius: 8px;
            background-color: #f0f0f0; /* Warna input terang sesuai desain */
            font-size: 16px;
            outline: none;
            color: #333;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.2); /* Shadow ke dalam */
            font-weight: normal; /* Kembali ke normal, tidak terlalu bold */
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            box-shadow: 0 0 0 2px #791a27; /* Outline saat fokus */
        }

        /* Posisi Ikon di dalam input */
        .input-group .icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888; /* Warna ikon lebih gelap */
            font-size: 18px;
            z-index: 2; /* Pastikan ikon di atas input */
        }

        .input-group .eye-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
            font-size: 18px;
            z-index: 2;
        }

        /* Styling Tombol Register */
        .register-button {
            width: 100%;
            padding: 15px;
            background-color: #791a27; /* Merah Marun */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 25px; /* Jarak lebih besar dari input terakhir */
            transition: background-color 0.3s, transform 0.2s;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .register-button:hover {
            background-color: #5a141d;
            transform: translateY(-2px);
        }

        /* Styling Pesan Error/Success */
        .alert-message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: left;
            font-size: 14px;
        }
        .alert-error {
            background-color: #fdd; 
            color: #a00;
            border: 1px solid #a00;
        }
        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #3c763d;
        }
        
    </style>
</head>
<body>

    <div class="navbar">
        <div class="navbar-logo">
        SHOESTORE
        </div>
        <div class="navbar-links">
            <a href="#">ABOUT</a>
            <a href="#">COLLECTIONS</a>
            <a href="#">SHOP</a>
            <a href="#">CONTACT</a>
        </div>
        <div class="navbar-icons">
            {{-- Menggunakan Font Awesome Icons --}}
            <a href="#"><i class="fas fa-search"></i></a> 
            <a href="#"><i class="fas fa-heart"></i></a> 
            <a href="#"><i class="fas fa-shopping-cart"></i></a> 
            <a href="#"><i class="fas fa-user"></i></a> 
        </div>
    </div>

    <div class="main-content">
        <div class="register-box">
            <h2>Sign In</h2> 
            
            @if (session('success'))
                <div class="alert-message alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-message alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf 

                <div class="input-group">
                    <span class="icon"><i class="fas fa-user"></i></span> 
                    <input type="text" name="first_name" placeholder="First Name" required value="{{ old('first_name') }}">
                </div>

                <div class="input-group">
                    <span class="icon"><i class="fas fa-user"></i></span> 
                    <input type="text" name="last_name" placeholder="Last Name" required value="{{ old('last_name') }}">
                </div>

                <div class="input-group">
                    <span class="icon"><i class="fas fa-envelope"></i></span> 
                    <input type="email" name="email" placeholder="Email Address" required value="{{ old('email') }}">
                </div>

                <div class="input-group">
                    <span class="icon"><i class="fas fa-lock"></i></span> 
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span class="eye-icon" id="togglePassword" onclick="togglePasswordVisibility('password')"><i class="fas fa-eye"></i></span> 
                </div>

                <div class="input-group">
                    <span class="icon"><i class="fas fa-lock"></i></span> 
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                    <span class="eye-icon" id="toggleConfirmPassword" onclick="togglePasswordVisibility('password_confirmation')"><i class="fas fa-eye"></i></span> 
                </div>

                <button type="submit" class="register-button">Register</button>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const iconElement = document.getElementById(`toggle${fieldId.charAt(0).toUpperCase() + fieldId.slice(1)}`);
            const icon = iconElement.querySelector('i');

            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash'); // Mata terbuka
            } else {
                field.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye'); // Mata tertutup
            }
        }
    </script>
</body>
</html>