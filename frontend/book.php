<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$package_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Package</title>

<link rel="stylesheet" href="booking.css">
</head>
<body>

<div class="container">
    <h2>Book Your Package</h2>

    <form action="../admin/save_booking.php" method="POST">
        
        <input type="hidden" name="package_id" value="<?php echo $package_id; ?>">

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" name="phone" required>
        </div>

        <div class="form-group">
            <label>Travel Date</label>
            <input type="date" name="date" required>
        </div>

        <div class="form-group">
            <label>Number of Persons</label>
            <input type="number" name="persons" min="1" required>
        </div>

        <div class="form-group">
            <label>Special Request</label>
            <textarea name="message" rows="3"></textarea>
        </div>

        <button type="submit" class="btn" href="home.php">Confirm Booking</button>
    </form>
</div>

</body>
</html>