<?php
// LeleShop products grouped by type
$product_groups = [
    'Top Up Game' => [
        [
            'id' => 6,
            'name' => 'Diamond Free Fire 158',
            'price' => 25000,
            'old_price' => 35000,
            'discount' => 29,
            'rating' => 5.0,
            'image' => 'https://topup-garena.com/wp-content/uploads/free-fire-diamond-158.jpg'
        ],
        [
            'id' => 7,
            'name' => 'Mobile Legends Diamond 257',
            'price' => 45000,
            'old_price' => 55000,
            'discount' => 18,
            'rating' => 4.9,
            'image' => 'https://ml-static.moonton.com/static/content/ml/diamond/257.jpg'
        ],
        [
            'id' => 8,
            'name' => 'Diamond Free Fire 528',
            'price' => 85000,
            'old_price' => 110000,
            'discount' => 23,
            'rating' => 5.0,
            'image' => 'https://topup-garena.com/wp-content/uploads/free-fire-diamond-528.jpg'
        ],
        [
            'id' => 9,
            'name' => 'ML Diamond 527 + Ticket',
            'price' => 165000,
            'old_price' => 200000,
            'discount' => 17,
            'rating' => 4.8,
            'image' => 'https://ml-static.moonton.com/static/content/ml/diamond/527-ticket.jpg'
        ]
    ],
    'Barang Fisik' => [
        [
            'id' => 1,
            'name' => 'Lele Segar Premium 1kg',
            'price' => 25000,
            'old_price' => 30000,
            'discount' => 17,
            'rating' => 4.9,
            'image' => 'https://i0.wp.com/resepikan.com/wp-content/uploads/2019/06/Ikan-Lele-Potong.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Pakan Ikan Lele 5kg',
            'price' => 15000,
            'rating' => 4.7,
            'image' => 'https://ecs7.tokopedia.net/img/cache/300/attachment/2020/1/20/28672585/28672585_8f2a6a7b-0b2e-4b2b-9f5a-8c3d8f1e8f1e.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Akuarium LED 50L',
            'price' => 150000,
            'old_price' => 180000,
            'discount' => 17,
            'rating' => 4.8,
            'image' => 'https://cf.shopee.co.id/file/s-g6C3aK8fL0g7z4y5b2c1d0e9f8a7b6c5d4e3f2a1b0c9d8e7f6a5b4c3d2e1f0a9b8c7d6e5f4a3b2c1d0e9f8a7b6c5d4e3f2a1b0c.jpg'
        ],
        [
            'id' => 14,
            'name' => 'Gundam RX-78-2 Model Kit 1/144',
            'price' => 450000,
            'old_price' => 550000,
            'discount' => 18,
            'rating' => 4.9,
            'image' => 'https://www.bandaihobby.net/dam/image/product/medium/4549660545189_01.jpg'
        ],
        [
            'id' => 15,
            'name' => 'Gundam Unicorn Model Kit 1/144',
            'price' => 650000,
            'rating' => 5.0,
            'image' => 'https://www.bandaihobby.net/dam/image/product/medium/4549660194451_01.jpg'
        ],
        [
            'id' => 16,
            'name' => 'Attack on Titan Levi Hoodie',
            'price' => 350000,
            'old_price' => 450000,
            'discount' => 22,
            'rating' => 4.8,
            'image' => 'https://i.pinimg.com/736x/4a/5b/6c/4a5b6c8f9d0e1f2a3b4c5d6e7f8g9h0i.jpg'
        ]
    ],
    'Jasa & Digital' => [
        [
            'id' => 10,
            'name' => 'Pulsa Telkomsel 20K',
            'price' => 21000,
            'rating' => 4.9,
            'image' => 'https://ecs7.tokopedia.net/img/cache/300/product-1/2020/10/20/12345678/12345678_abc123def456_1.jpg'
        ],
        [
            'id' => 11,
            'name' => 'Token PLN 20K',
            'price' => 21500,
            'rating' => 4.9,
            'image' => 'https://cf.shopee.co.id/file/ef456789abcdef123456789abcdef123.jpg'
        ],
        [
            'id' => 12,
'name' => 'Jasa Joki Makalah (Per Halaman)',
            'price' => 25000,
            'rating' => 4.9,
            'image' => 'https://i.ibb.co/7vXqKkL/joki-makalah.jpg',
            'whatsapp' => true
        ],
        [
            'id' => 13,
            'name' => 'Jasa Top-up Website Game',
            'price' => 50000,
            'rating' => 5.0,
            'image' => 'https://i.ibb.co/kcL8YfP/topup-website.jpg',
            'whatsapp' => true
        ],

        [
            'id' => 13,
            'name' => 'Jasa Top-up Website Game',
            'price' => 50000,
            'rating' => 5.0,
            'image' => 'https://i.ibb.co/kcL8YfP/topup-website.jpg'
        ],
        [
            'id' => 17,
            'name' => 'Demon Slayer Tanjiro Figure (Custom)',
            'price' => 250000,
            'rating' => 4.9,
            'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/7/78/Tanjiro_Kamado_character%2C_Demon_Slayer.png/220px-Tanjiro_Kamado_character%2C_Demon_Slayer.png'
        ]
    ]
];

foreach ($product_groups as $type => $products) {
    echo '<h3 style="grid-column: 1 / -1; color: #EE4D2D; font-size: 1.5rem; margin: 2rem 0 1rem; text-align: center; font-weight: 700;">' . $type . '</h3>';
    foreach ($products as $product) {
        echo '<div class="product">';
        if (isset($product['discount'])) {
            echo '<div class="discount-badge">-' . $product['discount'] . '%</div>';
        }
        echo '<img src="' . $product['image'] . '" alt="' . htmlspecialchars($product['name']) . '" loading="lazy">';
        echo '<div class="product-info">';
        echo '<h3>' . htmlspecialchars($product['name']) . '</h3>';
        echo '<div class="price">Rp ' . number_format($product['price']) . '</div>';
        if (isset($product['old_price'])) {
            echo '<div class="old-price">Rp ' . number_format($product['old_price']) . '</div>';
        }
        echo '<div class="rating">⭐ ' . $product['rating'] . ' (' . rand(150,1500) . ' ulasan)</div>';
if (isset($product['whatsapp'])) {
            echo '<button class="add-btn whatsapp-btn" onclick="openWhatsApp(\'' . addslashes($product['name']) . '\')">Chat WA Penjual</button>';
        } else {
            echo '<button class="add-btn" onclick="addToCart(' . $product['id'] . ', \'' . addslashes($product['name']) . '\', ' . $product['price'] . ')">+ Tambah</button>';
        }
        echo '</div>';
        echo '</div>';
    }
}
?>
