<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="loader.css">
</head>
<body class="loading" >
    
    <?php include 'loader.php'; ?>
    <video autoplay muted loop id="myVideo">
        <source src="loginbg.mp4" type="video/mp4">
    </video>
    <div class="signup-container">
        <img src="RECILENS LOGO 500 X 500 .jpg" alt="logo" style="width: 80px; height: auto;">
       
        <h2>Let's Create</h2>
        <form id="signup-form" method="post" action="signin.php">
            <label for="first-name">*First Name:</label>
            <input type="text" id="first-name" name="first-name" required>

            <label for="last-name">*Last Name:</label>
            <input type="text" id="last-name" name="last-name" required>

            <label for="email">*E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="mobile">*Mobile no:</label>
            <input type="tel" id="mobile" name="mobile" required>

            <label for="password">*Password:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <i class="fas fa-eye" id="toggle-password" onclick="togglePasswordVisibility('password')"></i>
            </div>

            <label for="confirm-password">*Confirm Password:</label>
            <div class="password-container">
                <input type="password" id="confirm-password" name="confirm-password" required>
                <i class="fas fa-eye" id="toggle-confirm-password" onclick="togglePasswordVisibility('confirm-password')"></i>
            </div>
            <button type="submit" onclick="validateForm()">Sign Up</button>
        </form>
        <p>I'm Already a user, <a href="loginh.php">Login</a></p>
        
    </div>
   <script> window.addEventListener('load', function() {
            document.body.classList.remove('loading');
            document.getElementById('loader').style.display = 'none';
        });</script>
    <script src="signin.js"></script>
</body>
</html>