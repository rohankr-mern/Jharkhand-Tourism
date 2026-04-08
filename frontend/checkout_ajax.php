<?php
session_start();
include __DIR__ . '/../backend/config/db.php';

header('Content-Type: application/json');

// Check cart
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo json_encode(["status"=>"error","message"=>"Your cart is empty!"]);
    exit;
}

// Get POST data
$name = trim($_POST['name'] ?? '');
$mobile = trim($_POST['mobile'] ?? '');
$address = trim($_POST['address'] ?? '');

if (!$name || !$mobile || !$address) {
    echo json_encode(["status"=>"error","message"=>"Please fill in all details!"]);
    exit;
}

$total = 0;
$cart_items = [];

foreach ($_SESSION['cart'] as $id => $qty) {
    $id = (int)$id;
    $qty = (int)$qty;
    if ($id <= 0 || $qty <= 0) continue;

    $stmt = $conn->prepare("SELECT price FROM shop WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $res = $stmt->get_result();
    $product = $res->fetch_assoc();
    $stmt->close();

    if ($product) {
        $subtotal = $product['price'] * $qty;
        $total += $subtotal;
        $cart_items[] = ['id'=>$id, 'qty'=>$qty];
    }
}

if ($total <= 0) {
    echo json_encode(["status"=>"error","message"=>"Cart error!"]);
    exit;
}

// Insert order
$stmt = $conn->prepare("INSERT INTO orders (customer_name,mobile,address,total_price) VALUES (?,?,?,?)");
$stmt->bind_param("sssd",$name,$mobile,$address,$total);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// Insert items
$stmt = $conn->prepare("INSERT INTO order_items (order_id,product_id,quantity) VALUES (?,?,?)");
foreach ($cart_items as $item) {
    $stmt->bind_param("iii",$order_id,$item['id'],$item['qty']);
    $stmt->execute();
}
$stmt->close();

// Clear cart
unset($_SESSION['cart']);

echo json_encode(["status"=>"success","order_id"=>$order_id]);
exit;
?>