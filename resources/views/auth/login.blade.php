<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- RemixIcon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        /* Background langsung base64 (tidak perlu upload file) */
        .bg-image {
            background-image: url("{{ asset('gambar-home/baground.png') }}");/* BASE64 FULL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Warna sesuai desain */
        .maroon { color: #6F2626; }
        .bg-maroon { background-color: #6F2626; }
        .input-cream { background-color: #F1E8E2; }
    </style>
</head>

<body class="bg-image min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <nav class="w-full bg-maroon text-white py-4 px-10 flex justify-between items-center">
        <div class="font-bold text-xl tracking-wide">SHOESTORE</div>

        <ul class="flex gap-8 uppercase text-sm">
            <li><a href="#" class="hover:opacity-70">About</a></li>
            <li><a href="#" class="hover:opacity-70">Collections</a></li>
            <li><a href="#" class="hover:opacity-70">Shop</a></li>
            <li><a href="#" class="hover:opacity-70">Contact</a></li>
        </ul>

        <div class="flex gap-6 text-xl">
            <i class="ri-search-line"></i>
            <i class="ri-heart-line"></i>
            <i class="ri-user-line"></i>
        </div>
    </nav>

    {{-- LOGIN BOX --}}
    <div class="flex flex-col items-center justify-center flex-grow text-center pt-12">

        <h1 class="text-4xl font-bold maroon mb-1">Sign Up</h1>

        <p class="maroon italic mb-8">
            Welcome back! Please login to your account.
        </p>

        {{-- FORM --}}
        <form method="POST" action="{{ route('login') }}" class="w-full max-w-md">
            @csrf

            {{-- EMAIL --}}
            <div class="relative mb-5">
                <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 maroon text-lg"></i>

                <input type="email" name="email"
                    class="w-full input-cream text-maroon pl-12 pr-4 py-3 rounded-xl focus:ring-2 focus:ring-[#6F2626]"
                    placeholder="Email" required>
            </div>

            {{-- PASSWORD --}}
            <div class="relative mb-6">
                <i class="ri-lock-line absolute left-4 top-1/2 -translate-y-1/2 maroon text-lg"></i>
                <i class="ri-eye-line absolute right-4 top-1/2 -translate-y-1/2 maroon text-lg cursor-pointer"></i>

                <input type="password" name="password"
                    class="w-full input-cream text-maroon pl-12 pr-10 py-3 rounded-xl focus:ring-2 focus:ring-[#6F2626]"
                    placeholder="Password" required>
            </div>

            {{-- LOGIN BUTTON --}}
            <button type="submit"
                class="w-full bg-maroon text-white py-3 rounded-2xl text-lg font-semibold hover:opacity-90">
                Login
            </button>
        </form>

        {{-- CREATE ACCOUNT --}}
        <a href="{{ route('register') }}"
            class="mt-5 inline-block bg-maroon text-white py-2 px-8 rounded-full text-sm hover:opacity-90">
            Create Account
        </a>

    </div>

</body>
</html>
