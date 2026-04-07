<?php
session_start(); // Always at the top
?>
<?php
$conn = new mysqli("localhost", "root", "", "tour");

$result = $conn->query("SELECT * FROM comments ORDER BY id DESC");

$comments = [];

while($row = $result->fetch_assoc()) {
    $comments[] = $row;
}

echo json_encode($comments);
?>