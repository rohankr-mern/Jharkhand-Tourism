<?php
session_start();
include __DIR__ . '/../backend/config/db.php';
include __DIR__ . '/../includes/header.php';

$total = 0;
?>

<h2 class="h21">Your Cart</h2>

<table class="cart-table">
  <tr>
    <th>Image</th>
    <th>Product</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Subtotal</th>
    <th>Action</th>
  </tr>

<?php
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

    foreach($_SESSION['cart'] as $id => $qty) {
        $id = (int)$id;
        if ($id <= 0) continue;

        $result = mysqli_query($conn, "SELECT * FROM shop WHERE id=$id");
        if($row = mysqli_fetch_assoc($result)) {
            $subtotal = $row['price'] * $qty;
            $total += $subtotal;
?>

<tr>
  <td><img src="/project/admin/uploads/<?= $row['image']; ?>" class="cart-img"></td>
  <td><?= $row['name']; ?></td>
  <td>₹<?= $row['price']; ?></td>

  <td>
    <a href="update.php?id=<?= $id; ?>&action=dec">-</a>
    <?= $qty; ?>
    <a href="update.php?id=<?= $id; ?>&action=inc">+</a>
  </td>

  <td>₹<?= $subtotal; ?></td>

  <td>
    <a href="remove.php?id=<?= $id; ?>" class="remove-btn">Remove</a>
  </td>
</tr>

<?php
        }
    }
} else {
    echo "<tr><td colspan='6'>Cart is empty</td></tr>";
}
?>

</table>

<!-- Total Section -->
<div class="cart-total">
  <h3>Total: ₹<?= $total; ?></h3>
  <?php if ($total > 0) { ?>
    <a href="checkout.php" class="checkout-btn">Checkout</a>
  <?php } ?>
</div>

<?php include('../includes/footer.php'); ?>