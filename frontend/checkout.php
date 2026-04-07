<?php
session_start();
include __DIR__ . '/../backend/config/db.php';
include __DIR__ . '/../includes/header.php';


// Check cart
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("Your cart is empty!");
}

// If form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name'] ?? '');
    $mobile = trim($_POST['mobile'] ?? '');
    $address = trim($_POST['address'] ?? '');

    if (!$name || !$mobile || !$address) {
        die("Please fill in all details!");
    }

    $total = 0;
    $cart_items = [];

    foreach ($_SESSION['cart'] as $id => $qty) {
        $id = (int)$id;
        $qty = (int)$qty;

        if ($id <= 0 || $qty <= 0) continue;

        $stmt = $conn->prepare("SELECT price FROM shop WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $product = $res->fetch_assoc();
        $stmt->close();

        if ($product) {
            $subtotal = $product['price'] * $qty;
            $total += $subtotal;
            $cart_items[] = ['id' => $id, 'qty' => $qty];
        }
    }

    if ($total <= 0) {
        die("Cart error!");
    }

    // Insert order
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, mobile, address, total_price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $name, $mobile, $address, $total);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    // Insert items
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
    foreach ($cart_items as $item) {
        $stmt->bind_param("iii", $order_id, $item['id'], $item['qty']);
        $stmt->execute();
    }
    $stmt->close();

    // Clear cart
    unset($_SESSION['cart']);

    echo "<h2 style='text-align:center;color:green;'>Order Placed Successfully! 🎉</h2>";
    echo "<p style='text-align:center;'>Order ID: <b>$order_id</b></p>";

    exit;
}
?>

<div class="checkout-box">
    <h2>Checkout</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="text" name="mobile" placeholder="Mobile Number" required>
        <textarea name="address" placeholder="Address" required></textarea>

        <button type="submit">Place Order</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>