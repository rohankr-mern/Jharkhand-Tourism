<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: /project/backend/login.php");
    exit();
}


// DB Connection
$conn = mysqli_connect("localhost", "root", "", "tour");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Total Bookings
$book_query = "SELECT COUNT(*) AS total FROM bookings";
$book_result = mysqli_query($conn, $book_query);
$book_data = mysqli_fetch_assoc($book_result);

// Total Packages
$package_query = "SELECT COUNT(*) AS total FROM packages";
$package_result = mysqli_query($conn, $package_query);
$package_data = mysqli_fetch_assoc($package_result);

// Total Destinations
$dest_query = "SELECT COUNT(*) AS total FROM destinations";
$dest_result = mysqli_query($conn, $dest_query);
$dest_data = mysqli_fetch_assoc($dest_result);

// Total Products
$product_query = "SELECT COUNT(*) AS total FROM shop";
$product_result = mysqli_query($conn, $product_query);
$product_data = mysqli_fetch_assoc($product_result);

//Total Orders
$order_query = "SELECT COUNT(*) AS total FROM orders";
$order_result = mysqli_query($conn, $order_query);
$order_data = mysqli_fetch_assoc($order_result);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jharkhand Tourism Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Jharkhand Tourism Admin Dashboard</h1>

        <div class="stats-container">
            <div class="stat-card">
              <h2>Total Bookings</h2>
              <p><?php echo $book_data['total']; ?></p>
            </div>

            <div class="stat-card">
             <h2>Total Packages</h2>
             <p><?php echo $package_data['total']; ?></p>
            </div>

           <div class="stat-card">
              <h2>Total Destinations</h2>
              <p><?php echo $dest_data['total']; ?></p>
            </div>

            <div class="stat-card">
              <h2>Total Products</h2>
              <p><?php echo $product_data['total']; ?></p>
           </div>
           <div class="stat-card">
              <h2>Total Orders</h2>
              <p><?php echo $order_data['total']; ?></p>
            </div>
        </div>
        
        <button class="admin-btn" onclick="location.href='../index.php'">
            Go to Home Page
        </button>
        <button class="admin-btn" onclick="location.href='../admin/admin.php'">
            Go to Admin Panel
        </button>
        
    </div>
</body>
</html>