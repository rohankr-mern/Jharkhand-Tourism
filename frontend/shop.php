<?php
session_start();
?>
<?php 
include __DIR__ . '/../backend/config/db.php';
include __DIR__ . '/../includes/header.php';
?>

<!-- Header -->
<section class="header1">
    <h3>Authentic Jharkhand</h3>
    <h1>Tribal Craft Shop</h1>
    <p>Handcrafted souvenirs and authentic tribal art</p>
</section>

<!-- Products -->
<section class="products">

<?php

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query
$query = "SELECT * FROM shop";
$result = mysqli_query($conn, $query);

// Check query
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

// Loop data
while ($row = mysqli_fetch_assoc($result)) {

    $name = htmlspecialchars($row['name']);
    $category = htmlspecialchars($row['category']);
    $image = !empty($row['image']) ? basename($row['image']) : "default.jpg";
    $description = htmlspecialchars($row['description']);
    $price = htmlspecialchars($row['price']);
?>

    <div class="product">
        <img src="/project/admin/uploads/<?php echo $image; ?>" alt="<?php echo $name; ?>">

        <div class="product-info">
            <span class="category"><?php echo $category; ?></span>
            <h3><?php echo $name; ?></h3>
            <p><?php echo $description; ?></p>

            <div class="bottom">
    <span class="price">₹<?= $price; ?></span>
    <form action="cart.php" method="POST">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <button type="submit">Add to Cart</button>
    </form>
</div>
        </div>
    </div>

<?php
} // end while
?>

</section>

<?php include('../includes/footer.php'); ?>