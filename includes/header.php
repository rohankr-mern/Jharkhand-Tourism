<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jharkhand Tourism</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/project/assets/css/header.css">
    <link rel="stylesheet" href="/project/assets/css/index.css">
    <link rel="stylesheet" href="/project/assets/css/shop.css">
    <link rel="stylesheet" href="/project/assets/css/destination.css">
    <!-- <link rel="stylesheet" href="/project/assets/css/book.css"> -->
    <link rel="stylesheet" href="/project/assets/css/package.css">
    <link rel="stylesheet" href="/project/assets/css/gallery.css">
    <link rel="stylesheet" href="/project/assets/css/footer.css">
    <link rel="stylesheet" href="/project/assets/css/cart_page.css">
    <link rel="stylesheet" href="/project/assets/css/checkout.css">
    <link rel="stylesheet" href="/project/assets/css/home.css">


</head>
<body>
    <header>
    <div class="top-header">
        <div class="logo">
            <img src="/project/assets/img/logo-1.png" alt="logo">
            <a href="/project/index.php"><h2>Jharkhand Tourism</h2></a>
        </div>

        <!-- Hamburger -->
        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>

        <div class="right-section">
            <a href="/project/frontend/cart_page.php">
               <i class="fas fa-shopping-cart cart-icon"></i>
           </a>
          <?php if(isset($_SESSION['user_id'])): ?>
                <!-- Show profile icon and username if logged in -->
                <div class="profile">
                    <img src="/project/assets/img/icon-p6.png" alt="Profile Icon" class="profile-icon">
                    <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    <a href="/project/backend/actions/logout.php" class="logout-btn">Logout</a>
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
            <li><a href="/project/index.php">Home</a></li>
            <li><a href="/project/frontend/destination.php">Destination</a></li>
            <li><a href="/project/frontend/package.php">Package</a></li>
            <li><a href="/project/frontend/gallery.php">Gallery</a></li>
            <li><a href="/project/frontend/shop.php">Shop</a></li>
        </ul>
    </nav>
</header>
