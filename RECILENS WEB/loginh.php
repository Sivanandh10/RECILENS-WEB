<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECILENS Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="loader.css">
    <style>
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            filter: brightness(60%);
        }
        .captcha-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
        }
        .captcha-img {
            height: 40px; 
            width: 100%;
            user-select: none;
            background: #000;
            border-radius: 5px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .captcha {
            position: absolute;
            left: 50%;
            top: 50%;
            color: #fff;
            font-size: 20px;
            text-align: center;
            letter-spacing: 5px; 
            transform: translate(-50%, -50%);
            text-shadow: 0px 0px 2px #b1b1b1;
        }
        .status-text {
            display: none;
            font-size: 14px; 
            text-align: center;
            margin: 5px 0;
        }
        .fa fa-eye{
            margin-top: 150% !important;
        }
    </style>
</head>
<body class="loading">
    
    <?php include 'loader.php'; ?>
    <video autoplay muted loop id="myVideo">
        <source src="loginbg.mp4" type="video/mp4">
    </video>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-container bg-light rounded shadow p-4" style="opacity: 0.85; width: 90%; max-width: 400px;">
            <img src="RECILENS LOGO 500 X 500 .jpg" alt="logo" class="mb-3" style="width: 80px;">
            <h2 class="text-center mb-3">Login</h2>
            <form id="login-form" method="post" action="login.php">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="abc@gmail.com" required>
                    <span id="email-error" class="error-message text-danger"></span>
                </div>
                <div class="form-group password-container position-relative">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <i class="fa fa-eye" id="eye" onclick="togglePassword()" style="cursor: pointer; position: absolute; right: 10px; top: 38%;"></i>
                    <span id="password-error" class="error-message text-danger"></span>
                </div>
                <div class="captcha-area">
                    <div class="captcha-img">
                        <span class="captcha"></span>
                    </div>
                    <button type="button" class="btn btn-secondary reload-btn mt-2"><i class="fas fa-redo-alt"></i></button>
                </div>
                <div class="form-group input-area">
                    <input type="text" class="form-control" placeholder="Enter captcha" maxlength="6" spellcheck="false" required>
                </div>
                <div class="status-text"></div> 
                <button type="submit" id="login-button" class="btn btn-primary btn-block" disabled>Login</button>
            </form>
            <p class="mt-3">Don't have an account? <a href="sing in.php">Sign Up</a></p>
            <div class="forgot-password-container">
                <button id="forgot-password" class="btn btn-link" onclick="redirectToForgotPassword()">Forgot Password?</button>
            </div>
        </div>
    </div>
    <div id="success-message" class="success-message"></div>
    <div id="error-message" class="error-message"></div>
    <script>
        window.addEventListener('load', function() {
            document.body.classList.remove('loading');
            document.getElementById('loader').style.display = 'none';
        });

        function redirectToForgotPassword() {
            document.body.style.transition = "opacity 0.5s ease";
            document.body.style.opacity = "0";
            
            setTimeout(function() {
                window.location.href = "forgotpass.php"; 
            }, 500); 
        }

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        const captcha = document.querySelector(".captcha"),
        reloadBtn = document.querySelector(".reload-btn"),
        inputField = document.querySelector(".input-area input"),
        statusTxt = document.querySelector(".status-text"),
        loginButton = document.getElementById("login-button");

        let allCharacters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
                             'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd',
                             'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
                             't', 'u', 'v', 'w', 'x', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

        function getCaptcha() {
            captcha.innerText = ''; 
            for (let i = 0; i < 6; i++) {
                let randomCharacter = allCharacters[Math.floor(Math.random() * allCharacters.length)];
                captcha.innerText += ` ${randomCharacter}`;
            }
        }

        getCaptcha(); 

        reloadBtn.addEventListener("click", () => {
            getCaptcha(); 
        });

        inputField.addEventListener("input", e => {
            const inputVal = inputField.value.split('').join(' ');
            if (inputVal === captcha.innerText) {
                statusTxt.style.color = "#4db2ec";
                statusTxt.innerText = "Nice! You don't appear to be a robot.";
                statusTxt.style.display = "block";
                loginButton.disabled = false; 
            } else {
                statusTxt.style.color = "#ff0000";
                statusTxt.innerText = "Captcha not matched. Please try again!";
                statusTxt.style.display = "block";
                loginButton.disabled = true; 
            }
        });
    </script>
    <script src="login.js"></script>
</body>
</html>