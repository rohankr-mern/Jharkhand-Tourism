<?php
session_start(); // Start session at the top

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $host = "localhost";
    $db   = "tour";  // your existing database
    $user = "root";  // MySQL username
    $pass = "";      // MySQL password

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Check if username exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? OR email=?");
    $stmt->bind_param("ss", $username, $username); // allow login via username or email
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; 

            // Redirect to home page
            if ($user['role'] === 'admin') {
                header("Location: http://localhost/project/admin/dashboard.php");
            } else {
                header("Location: http://localhost/project/index.php");
            }
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "User not found!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="http://localhost/project/assets/css/login.css">
</head>
<body>
    <div class="login-container">

        <?php if (!empty($error)) { echo "<p class='error-msg'>$error</p>"; } ?>

        <form class="login-form" action="" method="POST">
            <span class="boxx"><a href="/project/index.php"><img src="/project/assets/img/home.png" alt=""></a>
            <h2>Login</h2></span>
            <div class="input-group">
                <label for="username">Username or Email</label>
                <input type="text" id="username" name="username" placeholder="Enter username or email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" href="login.php">Login</button>
            <p class="signup-link">Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>