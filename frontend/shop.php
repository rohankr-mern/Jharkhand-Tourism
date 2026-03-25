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

    // Safe output
    $name = htmlspecialchars($row['name']);
    $category = htmlspecialchars($row['category']);
    $image = htmlspecialchars($row['image']);
    $description = htmlspecialchars($row['description']);
    $price = htmlspecialchars($row['price']);


    // Image check
  $image = !empty($row['image']) ? basename($row['image']) : "default.jpg";
?>
  <section class="products">

    <!-- Product 1 -->
    <div class="product">
      <img src="../admin/uploads/<?php echo $row['image']; ?>">

      <div class="product-info">
        <span class="category"><?php echo $category?>;</span>
        <h3><?php echo $name;?></h3>
        <p>
          <?php echo $description;?>
        </p>

        <div class="bottom">
          <span class="price">₹<?php echo $price?></span>
          <button>Add</button>
        </div>
      </div>
    </div>
  <?php
}
?>
</section>
  
<?php include('../includes/footer.php')?>