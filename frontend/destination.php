<?php include('../backend/config/db.php'); ?>
<?php include('../includes/header.php')?>

<section class="destinations">

  <!-- Heading -->
  <div class="heading">
    <h3>Explore</h3>
    <h1>Destinations</h1>
    <p>Discover the most beautiful places in Jharkhand</p>
  </div>

<div class="cards"> 

<?php

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query
$query = "SELECT * FROM destinations";
$result = mysqli_query($conn, $query);

// Check query
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

// Loop data
while ($row = mysqli_fetch_assoc($result)) {

    // Safe output
    $name = htmlspecialchars($row['name']);
    $location = htmlspecialchars($row['location']);
    $description = htmlspecialchars($row['description']);

    // Image check
  $image = !empty($row['image']) ? basename($row['image']) : "default.jpg";
?>
    
  <div class="card">
    <img src="../admin/uploads/<?php echo $row['image']; ?>">
    <div class="card-content">
      <span class="location">📍 <?php echo $location; ?></span>
      <h2><?php echo $name; ?></h2>
      <p><?php echo $description; ?></p>
    </div>
  </div>

<?php
}
?>
</div>
</section>

<?php include('../includes/footer.php')?>