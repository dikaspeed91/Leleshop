<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeleShop - Toko Penjualan Barang</title>
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
                <input type="text" id="search" placeholder="Cari Diamond FF, Pulsa, Token, Joki...">
            </div>
            <nav id="main-nav">
                <a href="index.php">Beranda</a>
                <a href="#products">Produk</a>
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

    <main>
        <section id="hero">
            <h2>🛒 Belanja Hemat di LeleShop!</h2>
            <p>Diamond FF/ML, Pulsa, Token Listrik, Joki Makalah - Harga Terbaik!</p>
        </section>

        <section id="categories">
            <h3 style="text-align: center; color: #EE4D2D; margin: 2rem 0;">Kategori Populer</h3>
            <div style="display: flex; justify-content: center; flex-wrap: wrap;">
                <button class="category-btn">Lele Segar</button>
                <button class="category-btn">Diamond Game</button>
                <button class="category-btn">Pulsa/Token</button>
                <button class="category-btn">Jasa Joki</button>
            </div>
        </section>

        <section id="flash-sale">
            <h3>🔥 Flash Sale - Diamond FF 528 Diskon 23%</h3>
            <p>Hanya hari ini! Stok terbatas.</p>
        </section>

        <section id="products">
            <h2 style="text-align: center; color: #333; margin-bottom: 2rem;">Produk Terlaris</h2>
            <div id="product-grid">
                <?php include 'products.php'; ?>
            </div>
        </section>
        </section>
    </main>

    <!-- Floating Chat &amp; Donasi Button -->
    <div class="floating-buttons">
        <a href="javascript:void(0)" onclick="openWhatsApp('Chat umum')" class="float-wa" title="Chat Penjual">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WA" width="50">
        </a>
        <a href="https://wa.me/6287866158652?text=Saya ingin donasi ke LeleShop. Nomor Dana/Gopay: 087866158652" class="float-donation" title="Donasi">
            💰 Donasi
        </a>
    </div>


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
        // Simple search functionality
        document.getElementById('search').addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            const products = document.querySelectorAll('.product');
            products.forEach(product => {
                const name = product.querySelector('h3').textContent.toLowerCase();
                product.style.display = name.includes(term) ? 'block' : 'none';
            });
        });

        // Header scroll toggle
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
