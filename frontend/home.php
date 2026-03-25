<?php
session_start(); // Always at the top
?>
<?php 
include __DIR__ . '/../backend/config/db.php';
include __DIR__ . '/../includes/header.php';
?>

<section class="hero">
    <div class="hero-content">
        <h3>EXPLORE THE UNEXPLORED</h3>
        <h1>Discover Jharkhand</h1>
        <p>
            Land of forests, waterfalls, and ancient tribal heritage. 
            Begin your journey into the heart of India's natural paradise.
        </p>
        <button class="explore-btn">Explore Now</button>
    </div>
</section>

<section class="stats">
    <div class="container">
        <div class="stat-item">
            <h2>30+</h2>
            <p>Waterfalls</p>
        </div>
        <div class="stat-item">
            <h2>11</h2>
            <p>National Parks</p>
        </div>
        <div class="stat-item">
            <h2>32</h2>
            <p>Tribal Groups</p>
        </div>
        <div class="stat-item">
            <h2>1000+</h2>
            <p>Heritage Sites</p>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about">
  <div class="about-container">
    <div class="about-image">
      <img src="/project/assets/img/about.jpg" alt="About Image">
    </div>

    <div class="about-text">
      <h2>About Us</h2>
      <p>
        We are dedicated to providing the best experience for our users. 
        Our mission is to deliver quality and build trust through innovation.
      </p>
      <p>
        Join us on our journey as we continue to grow and create amazing solutions.
      </p>
      <button>Learn More</button>
    </div>
  </div>
</section>


<!-- sweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- show booking success -->
<?php if(isset($_GET['status'])) { ?>
<script>
Swal.fire({
  title: 'Success!',
  text: 'Booking Successful!',
  icon: 'success',
  confirmButtonText: 'OK'
});
</script>
<?php } ?>


<?php include('./includes/footer.php')?>