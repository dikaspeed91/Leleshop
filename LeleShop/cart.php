<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - LeleShop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php session_start(); ?>
    <header class="header-main" id="main-header">
        <div class="logo-section">
            <img src="images/eva.png" alt="LeleShop Logo" id="logo">
            <h1>LeleShop</h1>
        </div>
        <button class="toggle-header" onclick="toggleHeader()">☰</button>
        <div class="header-content" id="header-content">
            <div id="search-container">
                <input type="text" id="search" placeholder="Cari di Keranjang...">
            </div>
            <nav id="main-nav">
                <a href="index.php">Beranda</a>
                <a href="index.php#products">Produk</a>
                <a href="cart.php">Keranjang</a>
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="logout.php">Logout (<?php echo $_SESSION['user']; ?>)</a>
                <?php else: ?>
                    <a href="#" onclick="showLoginModal()">Masuk</a>
                    <a href="register.php">Daftar</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main id="cart">
        <h2>Keranjang Belanja</h2>
        <div id="cart-items">
            <p>Keranjang kosong.</p>
        </div>
        <div class="total" id="cart-total" style="display: none;">
            Total Belanja: <span id="total-amount">Rp 0</span>
            <br><button onclick="checkout()" style="margin-top: 1rem; padding: 1rem 2rem; background: #EE4D2D; color: white; border: none; border-radius: 25px; font-size: 1.1rem; cursor: pointer;">Checkout</button>
        </div>
    </main>

    <!-- Shopee-like Login Modal -->
    <div id="login-modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="hideLoginModal()">&amp;times;</span>
            <h3>Masuk ke LeleShop</h3>
            <form action="login.php" method="post" style="max-width: 350px; margin: 0 auto;">
                <input type="email" name="email" placeholder="Email / No HP" required style="width: 100%; padding: 12px; margin-bottom: 12px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box;">
                <input type="password" name="pass" placeholder="Password" required style="width: 100%; padding: 12px; margin-bottom: 16px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box;">
                <button type="submit" style="width: 100%; padding: 12px; background: linear-gradient(135deg, #EE4D2D, #FF5722); color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 500; cursor: pointer;">Masuk</button>
            </form>
            <p style="text-align: center; margin-top: 16px; color: #666;">Belum punya akun? <a href="register.php" style="color: #EE4D2D; font-weight: 500;">Daftar sekarang</a></p>
            <p style="text-align: center; color: #999; font-size: 14px;">Demo: admin@test.com / 123456</p>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        // Header scroll toggle for cart
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            const header = document.getElementById('main-header');
            if (currentScroll > lastScroll && currentScroll > 100) {
                header.classList.add('header-collapsed');
            } else {
                header.classList.remove('header-collapsed');
            }
            lastScroll = currentScroll;
        });
    </script>
</body>
</html>
