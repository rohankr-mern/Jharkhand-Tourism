<?php
session_start(); // Always at the top
?>

<?php
session_start(); // Always at the top
?>
<?php
$conn = new mysqli("localhost", "root", "", "tour");

$name = $_POST['name'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];

$sql = "INSERT INTO comments (name, comment, rating) VALUES ('$name', '$comment', '$rating')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}
?>