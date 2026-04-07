<?php
session_start();
session_destroy(); //destroy all the session data
header("Location: http://localhost/project/index.php"); //redirect to home.php after logout
exit();
?>