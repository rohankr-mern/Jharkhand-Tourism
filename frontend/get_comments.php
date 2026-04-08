<?php
session_start();

$conn = new mysqli("localhost", "root", "", "tour");
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

$result = $conn->query("SELECT * FROM comments ORDER BY id DESC");

$comments = [];
while($row = $result->fetch_assoc()) {
    $comments[] = $row; // just store in array
}

// return JSON only
header('Content-Type: application/json');
echo json_encode($comments);

$conn->close();
?>