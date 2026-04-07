<?php
session_start();

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id) || $id <= 0) {
    die("Invalid product ID");
}

$id = (int)$id;

if (isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
}

header("Location: cart_page.php");
exit();
?>