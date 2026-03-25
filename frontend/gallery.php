<?php include('../includes/header.php')?>


<!-- GALLERY SECTION -->

<?php
$conn = mysqli_connect("localhost", "root", "", "tour");

// Check connection FIRST
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM images";
$result = mysqli_query($conn, $query);
?>

<section class="gallery-section">
    <h2>My Gallery</h2>

    <div class="gallery-container">

        <?php while ($row = mysqli_fetch_assoc($result)) { 
        
            // Image check
            $image = !empty($row['image']) ? basename($row['image']) : "default.jpg";
        ?>

            <div class="gallery-item">
                <img src="../admin/uploads/<?php echo $image; ?>" alt="Image">
                <div class="overlay">Jharkhand Tourism</div>
            </div>

        <?php } ?>

    </div>
</section>

  
<?php include('../includes/footer.php')?>