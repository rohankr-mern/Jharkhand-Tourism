<?php
session_start();
?>
<?php include('../includes/header.php')?>

<!-- Header -->
  <section class="header1">
    <h3>Curated Experiences</h3>
    <h1>Tour Packages</h1>
    <p>Handcrafted tours for every kind of travellers</p>
  </section>

<!-- PACKAGE SECTION -->
<div class="cards">
<?php
 $conn = mysqli_connect("localhost", "root", "", "tour");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query
$query = "SELECT * FROM packages";
$result = mysqli_query($conn, $query);

// Check query
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

// Loop data
while ($row = mysqli_fetch_assoc($result)) {

    // Safe output
    $title = htmlspecialchars($row['title']);
    $image = !empty($row['image']) ? basename($row['image']) : "default.jpg";
    $duration = htmlspecialchars($row['duration']);
    $destinations_count = htmlspecialchars($row['destinations_count']);
    $destinations = explode(",", $row['destinations']);   
    $highlights = explode(",", $row['highlights']);
    $price = htmlspecialchars($row['price']);


    // Image check
  $image = !empty($row['image']) ? basename($row['image']) : "default.jpg";
?>
    <!-- card 1 -->
  <div class="card">
    <div class="card-image">
      <img src="../admin/uploads/<?php echo $image ?>" alt="<?php echo $title ?>">
      <div class="card-title"><?php echo $title ?></div>
    </div>

    <div class="card-content">
      <div class="card-details">
        <span><?php echo $duration ?></span>
        <span><?php echo $destinations_count ?> destinations</span>
      </div>

    <div class="destinations1">
        <?php foreach($destinations as $d): ?>
          <span><?php echo htmlspecialchars(trim($d)) ?></span>
        <?php endforeach; ?>
      </div>

      <div class="highlights">
        <p>Highlights:</p>
        <ul>
          <?php foreach($highlights as $h): ?>
            <li><?php echo htmlspecialchars(trim($h)) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="card-footer">
        <div class="price">₹<?php echo $price?></div>
        <?php if(isset($_SESSION['user_id'])) { ?>
        <a href="book.php?id=<?php echo $row['id']; ?>" class="btn" href="book.php">Book Now</a>
        <?php } else { ?>
        <a href="login.php" class="btn">Login to Book</a>
        <?php } ?>
      </div>
    </div>
  </div>    
  <?php
}
?>
</div>

<?php include('../includes/footer.php')?>