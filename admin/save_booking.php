

<?php
$conn = new mysqli("localhost", "root", "", "tour");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$persons = $_POST['persons'];
$message = $_POST['message'];
$package_id = $_POST['package_id'];

$sql = "INSERT INTO bookings (package_id, name, email, phone, travel_date, persons, message)
        VALUES ('$package_id', '$name', '$email', '$phone', '$date', '$persons', '$message')";

if($conn->query($sql)) {
    echo "success";
} else {
    echo "error";
}
?>