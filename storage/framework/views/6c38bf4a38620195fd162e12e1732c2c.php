<header class="navbar">
    <div class="logo">
        <span class="brand">ShoeStore</span>
        <img src="<?php echo e(asset('gambar-home/logo.jpg.png')); ?>" alt="Logo" class="logo-icon">
    </div>

    <nav class="menu">
        <a href="<?php echo e(route('about')); ?>">About</a>
        <span class="dot">•</span>
        <a href="#">Collections</a>
        <span class="dot">•</span>
        <a href="<?php echo e(route('home')); ?>">home</a>    
        <span class="dot">•</span>
        <a href="#">Contact</a>
    </nav>

   <div class="icons">
    <!-- Tombol Search -->
    <a href="javascript:void(0);" id="search-toggle"><i class="fa fa-search"></i></a>

    <!-- Form Pencarian -->
    <form id="search-form" action="<?php echo e(route('produk.search')); ?>" method="GET" style="display:none;">
        <input type="text" name="q" placeholder="Search..." class="search-input">
    </form>

    <!-- Ikon lain -->
    <a href="#"><i class="fa fa-heart"></i></a>
    <a href="#"><i class="fa fa-shopping-bag"></i></a>

    <a href="<?php echo e(route('logout')); ?>" title="Logout">
    <i class="fa fa-sign-out-alt"></i>
</a>

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

.search-input {
    padding: 5px 10px;
    border-radius: 5px;
    border: none;
    outline: none;
    font-size: 0.9rem;
    width: 150px;
    transition: 0.3s ease;
}

#search-form {
    display: inline-block;
}

#search-form.show {
    display: inline-block !important;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchToggle = document.getElementById('search-toggle');
    const searchForm = document.getElementById('search-form');

    searchToggle.addEventListener('click', () => {
        if (searchForm.style.display === 'none' || searchForm.style.display === '') {
            searchForm.style.display = 'inline-block';
        } else {
            searchForm.style.display = 'none';
        }
    });
});
</script>

<!-- Font Awesome (ikon search, love, bag) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<?php /**PATH D:\uaspbw\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>