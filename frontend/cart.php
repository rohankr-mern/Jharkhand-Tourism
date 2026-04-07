<?php
session_start();

// Get product ID
$id = $_POST['id'] ?? null;

// Validate ID
if (!$id || !is_numeric($id) || $id <= 0) {
    die("Invalid product ID");
}

$id = (int)$id;

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add or increment product quantity
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]++;
} else {
    $_SESSION['cart'][$id] = 1;
}

// Redirect back to products or cart page
header("Location: cart_page.php");
exit();
?>