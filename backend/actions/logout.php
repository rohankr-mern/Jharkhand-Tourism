<?php
session_start();
session_destroy(); //destroy all the session data
header("Location: ./frontend/home.php"); //redirect to home.php after logout
exit();
?>