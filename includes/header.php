<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jharkhand Tourism</title>
    <link rel="stylesheet" href="<?php echo 'http://localhost/project/assets/css/header.css';?>">
    <link rel="stylesheet" href="<?php echo 'http://localhost/project/assets/css/index.css'; ?>">
    <link rel="stylesheet" href="../assets/css/shop.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/destination.css">
    <link rel="stylesheet" href="../assets/css/package.css">
    <link rel="stylesheet" href="../assets/css/gallery.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>
    <header>
    <div class="top-header">
        <div class="logo">
            <img src="/project/assets/img/logo-1.png" alt="logo">
            <a href="../frontend/home.php"><h2>Jharkhand Tourism</h2></a>
        </div>

        <!-- Hamburger -->
        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>

        <div class="right-section">
            <i class="fas fa-shopping-cart cart-icon"></i>

            <?php if(isset($_SESSION['user_id'])): ?>
                <!-- Show profile icon and username if logged in -->
                <div class="profile">
                    <img src="../assets/img/icon-p6.png" alt="Profile Icon" class="profile-icon">
                    <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    <a href="../backend/actions/logout.php" class="logout-btn">Logout</a>
                </div>
            <?php else: ?>
                <!-- Show login button if not logged in -->
                <a href="/project/backend/actions/login.php"><button class="login-btn">Login</button></a>
            <?php endif; ?>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar" id="navbar">
        <ul>
            <li><a href="/project/frontend/home.php">Home</a></li>
            <li><a href="/project/frontend/destination.php">Destination</a></li>
            <li><a href="/project/frontend/package.php">Package</a></li>
            <li><a href="/project/frontend/gallery.php">Gallery</a></li>
            <li><a href="/project/frontend/shop.php">Product</a></li>
        </ul>
    </nav>
</header>
