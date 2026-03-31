<?php
$orders_file = 'orders.json';
if (file_exists($orders_file)) {
    $orders = json_decode(file_get_contents($orders_file), true);
    echo '<pre>' . json_encode($orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . '</pre>';
}
?>
