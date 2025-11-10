<header class="navbar">
    <div class="logo">
        <span class="brand">ShoeStore</span>
        <img src="{{ asset('images/shoe-icon.png') }}" alt="Logo" class="logo-icon">
    </div>

    <nav class="menu">
        <a href="{{route('about')}}">About</a>
        <span class="dot">•</span>
        <a href="#">Collections</a>
        <span class="dot">•</span>
        <a href="#">Shop</a>
        <span class="dot">•</span>
        <a href="#">Contact</a>
    </nav>

    <div class="icons">
        <a href="#"><i class="fa fa-search"></i></a>
        <a href="#"><i class="fa fa-heart"></i></a>
        <a href="#"><i class="fa fa-shopping-bag"></i></a>
    </div>
</header>

<style>
/* --- NAVBAR STYLE --- */
.navbar {
    background-color: #602d2d;
    color: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 50px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    font-family: 'Poppins', sans-serif;
}

.logo {
    display: flex;
    align-items: center;
    gap: 8px;
}

.brand {
    font-weight: 700;
    font-size: 1.3rem;
    color: #fff;
}

.logo-icon {
    width: 24px;
    height: 24px;
}

.menu {
    display: flex;
    align-items: center;
    gap: 18px;
}

.menu a {
    color: white;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
    transition: 0.3s;
}

.menu a:hover {
    color: #e6cfcf;
}

.dot {
    color: #d6a8a8;
    font-size: 0.9rem;
}

.icons {
    display: flex;
    align-items: center;
    gap: 15px;
}

.icons a {
    color: white;
    font-size: 1rem;
    transition: 0.3s;
}

.icons a:hover {
    color: #e6cfcf;
}
</style>

<!-- Font Awesome (ikon search, love, bag) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
