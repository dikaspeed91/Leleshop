<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$orders_file = 'orders.json';
$orders = file_exists($orders_file) ? json_decode(file_get_contents($orders_file), true) : [];
$user_orders = array_filter($orders, function($order) {
    return $order['user'] == $_SESSION['user'];
});

if ($_POST) {
    $new_order = [
        'id' => uniqid(),
        'user' => $_SESSION['user'],
        'items' => json_decode($_POST['items'], true),
        'total' => $_POST['total'],
        'proof' => $_POST['proof'],
        'status' => 'Menunggu Verifikasi',
        'timestamp' => date('Y-m-d H:i:s')
    ];
    $orders[] = $new_order;
    file_put_contents($orders_file, json_encode($orders));
    $success = 'Pesanan berhasil dikirim! Tunggu verifikasi penjual.';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pesanan - LeleShop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>  <!-- Assume header shared -->
    
    <main style="max-width: 800px; margin: 120px auto 0; padding: 2rem;">
        <h2>Pesanan Saya</h2>
        <?php if (isset($success)): ?>
            <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <form method="post" enctype="multipart/form-data" style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
            <h3>Kirim Bukti Pembayaran</h3>
            <p><strong>Total: Rp </strong><input type="hidden" name="total" id="order-total" value=""><span id="display-total">0</span></p>
            <textarea name="items" id="order-items" style="width: 100%; height: 100px; margin-bottom: 1rem;" placeholder="Daftar item belanja..." readonly></textarea>
            <input type="file" name="proof" accept="image/*" required style="width: 100%; padding: 0.5rem; margin-bottom: 1rem; border: 1px solid #ddd; border-radius: 8px;">
            <button type="submit" style="width: 100%; padding: 1rem; background: #4CAF50; color: white; border: none; border-radius: 8px; font-size: 1rem;">Kirim Bukti &amp; Verifikasi</button>
        </form>
        
        <h3 style="margin-top: 3rem;">Riwayat Pesanan</h3>
        <?php if (empty($user_orders)): ?>
            <p>Belum ada pesanan.</p>
        <?php else: ?>
            <div style="display: grid; gap: 1rem;">
                <?php foreach (array_reverse($user_orders) as $order): ?>
                    <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 12px; border-left: 4px solid #EE4D2D;">
                        <p><strong>ID: </strong><?php echo $order['id']; ?></p>
                        <p><strong>Total: Rp </strong><?php echo number_format($order['total']); ?></p>
                        <p><strong>Status: </strong><span style="color: <?php echo $order['status'] == 'Terverifikasi' ? '#28a745' : '#ffc107'; ?>"><?php echo $order['status']; ?></span></p>
                        <p><small><?php echo $order['timestamp']; ?></small></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load cart for order form
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            let total = 0;
            let itemsText = '';
            cart.forEach(item => {
                itemsText += `${item.name} x${item.quantity} (Rp ${item.price.toLocaleString()})\n`;
                total += item.price * item.quantity;
            });
            document.getElementById('order-total').value = total;
            document.getElementById('display-total').textContent = total.toLocaleString();
            document.getElementById('order-items').value = itemsText;
        });
    </script>
</body>
</html>
