<?php
session_start(); // Start the session at the beginning of the file

if (isset($_GET['logout'])) {
    // Clear all session variables
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();

    // Redirect to index.php
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECILENS - Product Landing Page</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="loader.css">
</head>
<body class="loading" >
<?php include 'loader.php';?>
<?php include 'nav.php'; ?>
    <section class="hero">
        <div class="hero-content">
            <h1>Experience the future of product with,</h1><h2> RECILENS</h2>
            <p>Welcome to RECILENS, where state-of-the-art technology meets unparalleled expertise. Our innovative solutions in product are designed to revolutionize the way you interact with the digital world.</p>
        </div>
        <div class="hero-image">
            <img src="service (1).jpg" alt="RECILENS Product" style="height: auto; width:50%; margin-left: 40%;">
        </div>
    </section>

    <section class="products">
        <h2>Our Products</h2>
        <div class="product-grid">
            <div class="product">
                <img src="product1.webp" alt="Product 1">
                <h3>Product 1</h3>
                <a href="product1.php"><button class="butt">View Product</button></a>
            </div>
            <div class="product">
                <img src="product2.webp" alt="Product 2">
                <h3>Product 2</h3>
                <a href="product2.php"><button class="butt">View Product</button></a>
            </div>
            <div class="product">
                <img src="product3.webp" alt="Product 3">
                <h3>Product 3</h3>
                <a href="product3.php"><button class="butt">View Product</button></a>
            </div>
            <div class="product">
                <img src="service (2).jpg" alt="Product 4">
                <h3>Product 4</h3>
                <a href="product4.php"><button class="butt">View Product</button></a>
            </div>
            <div class="product">
                <img src="service (1).jpg" alt="Product 5">
                <h3>Product 5</h3>
                <a href="product5.php"><button class="butt">View Product</button></a>
            </div>
            <div class="product">
                <img src="service (3).jpg" alt="Product 6">
                <h3>Product 6</h3>
                <a href="product6.php"><button class="butt">View Product</button></a>
            </div>
            <div class="product">
                <img src="product2.webp" alt="Product 7">
                <h3>Product 7</h3>
                <a href="product7.php"><button class="butt">View Product</button></a>
            </div>
            <div class="product">
                <img src="service (2).jpg" alt="Product 8">
                <h3>Product 8</h3>
                <a href="product8.php"><button class="butt">View Product</button></a>
            </div>
            <div class="product">
                <img src="product1.webp" alt="Product 9">
                <h3>Product 9</h3>
                <a href="product9.php"><button class="butt">View Product</button></a>
            </div>
        </div>
    </section>
    <script> window.addEventListener('load', function() {
            document.body.classList.remove('loading');
            document.getElementById('loader').style.display = 'none';
        });</script>
    <script src="product.js"></script>
</body>
</html>