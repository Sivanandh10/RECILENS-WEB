<?php
session_start(); 

if (isset($_GET['logout'])) {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link rel="stylesheet" href="nav.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            backdrop-filter: blur(100px);
        }
        .l {
            color: rgb(244, 244, 244);
            background: linear-gradient(to right, red, blue, green, yellow);
            text-align: center;
            margin-left: 0%;
            margin-top: 8%;
            width: 140px;
        }
        .avatar {
            position: relative;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="na">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#home">
        <img src="RECILENS LOGO 500 X 500  - Copy.png" alt="Company Logo" style="height: 40px;">
        <span class="l">RECILENS</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['first_name'])): ?>
                <div class="avatar" id="avatar">
                <img src="avatar.webp" alt="User  Avatar" style="height: 40px; cursor: pointer;">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profile.html"><?php echo htmlspecialchars($_SESSION['first_name']); ?></a>
                        <a class="dropdown-item" href="profile.html">View Profile</a>
                        <a class="dropdown-item" href="?logout=true">Logout</a>
                    </div>
                </div>
            <li class="nav-item">
                <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#products">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#careers">Career</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
            
            <?php else: ?>
                <li class="nav-item">
                <a class="nav-link" href="#home">Home</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="#products">Products</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="#services">Services</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="#careers">Career</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
            <hr>
                <li class="nav-item">
                <div class="buttons">
            <a href="loginh.php"><button class="login">Login</button></a>
        </div>
        
                </li>
                <li class="nav-item">
                <div class="buttons">
            <a href="sing in.php"><button class="signup">Sign Up</button></a>
        </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html> 