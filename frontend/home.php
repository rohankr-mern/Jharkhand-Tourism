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
Land of lush forests, cascading waterfalls, and rich ancient tribal heritage—begin your journey into the heart of India’s natural paradise.        </p>
        <button class="explore-btn" href="/project/frontend/destination.php">Explore Now</button>
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

<!-- MAP SECTION -->
<div class="map-section">

  <div class="map">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1871081.3363543497!2d85.6460859!3d23.659654949999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398b2386df480857%3A0x62c5b809eee29004!2sJharkhand!5e0!3m2!1sen!2sin!4v1775543681530!5m2!1sen!2sin"
      allowfullscreen
      loading="lazy">
    </iframe>
  </div>

  <div class="comment">
    <h3>Leave a Comment</h3>
    <input type="text" id="name" placeholder="Your name">
    <input type="text" id="commentText" placeholder="Write your comment">

  <div class="rating">
  <input type="radio" name="rating" value="5" id="star5">
  <label for="star5">★</label>

  <input type="radio" name="rating" value="4" id="star4">
  <label for="star4">★</label>

  <input type="radio" name="rating" value="3" id="star3">
  <label for="star3">★</label>

  <input type="radio" name="rating" value="2" id="star2">
  <label for="star2">★</label>

  <input type="radio" name="rating" value="1" id="star1">
  <label for="star1">★</label>
</div>
    <button onclick="addComment()">Submit</button>
  </div>

</div>

<div class="comment-slider" id="commentSlider"></div>

<!-- sweetAlert CDN -->

<!-- show booking success -->
<?php if(isset($_GET['status'])) { ?>

<?php } ?>


<?php include('./includes/footer.php')?>