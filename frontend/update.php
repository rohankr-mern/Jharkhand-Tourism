<?php
session_start();

$id = $_GET['id'] ?? null;
$action = $_GET['action'] ?? null;

if (!$id || !is_numeric($id) || $id <= 0) {
    die("Invalid product ID");
}

$id = (int)$id;

if (!isset($_SESSION['cart'][$id])) {
    die("Product not in cart");
}

// Increment or decrement
if ($action === "inc") {
    $_SESSION['cart'][$id]++;
} elseif ($action === "dec") {
    $_SESSION['cart'][$id]--;
    if ($_SESSION['cart'][$id] <= 0) {
        unset($_SESSION['cart'][$id]);
    }
}

header("Location: cart_page.php");
exit();
?>