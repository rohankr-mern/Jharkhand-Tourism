<?php
// Connect to database
$connection = mysqli_connect('localhost', 'root', '', 'tour');

$success = false;

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if form submitted
if (isset($_POST['send'])) {

    // Handle image upload
    $image = "";
    if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $upload_dir = "./uploads/" . $image_name;

        if (move_uploaded_file($image_tmp, $upload_dir)) {
            $image = $image_name;
        } else {
            die("Failed to upload image.");
        }
    }

    // Insert query
    $sql = "INSERT INTO images (image)
            VALUES ('$image')";

    if (mysqli_query($connection, $sql)) {
        $success = true;
        header('Location: admin.php');
        exit;
    } else {
        die("Error inserting data: " . mysqli_error($connection));
    }

} else {
    echo 'Form not submitted properly.';
}
?>