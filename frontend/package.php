<?php
session_start();
?>
<?php include('../includes/header.php')?>

<!-- 🔲 Booking Popup -->
<div id="bookingPopup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closeBooking()">&times;</span>

    <h2>Book Package</h2>

    <form id="bookingForm1">
      <input type="hidden" name="package_id" id="package_id">

      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="phone" placeholder="Mobile Number" required>
      <input type="date" name="date" required>
      <input type="number" name="persons" placeholder="Persons" required>
      <textarea name="message" placeholder="Special Request"></textarea>

      <button type="submit">Confirm Booking</button>
    </form>
  </div>
</div>

<!-- ✅ Success Popup -->
<!-- <div id="successPopup" class="success-popup">
  <div class="success-content">
    <h3>🎉 Booking Successful!</h3>
    <button onclick="closeSuccess()">OK</button>
  </div>
</div> -->

<!-- PACKAGE SECTION CODE -->

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
        <button class="btn3" onclick="openBooking(<?php echo $row['id']; ?>)">Book Now</button>
        <?php } else { ?>
        <a href="/project/backend/actions/login.php" class="btn3">Login to Book</a>
        <?php } ?>
      </div>
    </div>
  </div>    
  <?php
}
?>
</div>

<?php include('../includes/footer.php')?>