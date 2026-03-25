<?php
// Start PHP at the top of the file
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Database connection
    $host = "localhost";
    $db   = "tour";     // your existing database
    $user = "root";     // MySQL username
    $pass = "";         // MySQL password

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Password validation
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $check = $conn->prepare("SELECT * FROM users WHERE email=?");
        $check->bind_param("s", $email);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $error = "Email already registered!";
        } else {
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashed_password);

            if ($stmt->execute()) {
                $success = "Signup successful! You can now <a href='login.php'>login</a>.";
            } else {
                $error = "Error: " . $stmt->error;
            }

            $stmt->close();
        }
        $check->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jharkhand Tourism - Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="signup-container">
        <h1>Sign Up</h1>

        <!-- Display success or error messages -->
        <?php if (!empty($error)) { echo "<p class='error-msg'>$error</p>"; } ?>
        <?php if (!empty($success)) { echo "<p class='success-msg'>$success</p>"; } ?>

        <form action="" method="POST" class="signup-form">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm password" required>
            </div>

            <button type="submit" class="signup-btn">Sign Up</button>
        </form>

        <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>