<?php
$conn = mysqli_connect("localhost", "root", "", "tour");

if(!$conn){
    die("Connection Failed");
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$persons = $_POST['persons'];
$message = $_POST['message'];
$package_id = $_POST['package_id'];

$query = "INSERT INTO bookings 
(package_id, name, email, phone, travel_date, persons, message)
VALUES 
('$package_id','$name','$email','$phone','$date','$persons','$message')";

if(mysqli_query($conn, $query)){
    header('Location: ../frontend/home.php');
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>