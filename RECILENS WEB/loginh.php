<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECILENS Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="loader.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            filter: brightness(60%);
        }

        .login-container {
            background: rgba(255, 255, 255, 0.85);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 90%;
            max-width: 400px;
            transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
        }

        .login-container img {
            width: 80px;
            height: auto;
            margin-bottom: 15px;
        }

        h2 {
            margin-bottom: 15px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.5em;
        }

        input[type="email"], input[type="password"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            height: 45px; 
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            opacity: 0.6; 
            pointer-events: none; 
        }

        button:hover {
            background-color: #45a049;
        }

        button:enabled {
            opacity: 1; 
            pointer-events: auto; 
        }

        .password-container {
            position: relative;
            width: 100.50%;
            margin-left: 0.80%;
        }

        .password-container i {
            position: absolute;
            right: 10px;
            top: 60%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .captcha-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
        }

        .captcha-area .captcha-img {
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

        .captcha-img .captcha {
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

 .captcha-area .reload-btn {
            width: 75px;
            height: 35px;
            font-size: 20px;
            margin-top: 10px;
            cursor: pointer;
        }
        

        .input-area {
            width: 100%;
            position: relative;
            margin-top: 10px;
        }

        .input-area input {
            width: 100%;
            height: 45px;
            outline: none;
            padding-left: 20px;
            font-size: 20px;
            border-radius: 5px;
            border: 1px solid #bfbfbf;
        }

        .input-area input:valid {
            border: 2px solid #4db2ec;
        }

        .status-text {
            display: none;
            font-size: 14px; 
            text-align: center;
            margin: 5px 0;
        }

        @media (max-width: 600px) {
            .login-container {
                width: 95%;
                padding: 15px;
            }

            .captcha-area .captcha-img {
                height: 30px; 
            }

            .captcha-img .captcha {
                font-size: 18px; 
            }

            .captcha-area .reload-btn {
                width: 60px;
                font-size: 18px;
            }

            .input-area input {
                height: 40px;
                font-size: 18px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body class="loading">
    
    <?php include 'loader.php'; ?>
    <video autoplay muted loop id="myVideo">
        <source src="loginbg.mp4" type="video/mp4">
    </video>
    <div class="login-container">
        <img src="RECILENS LOGO 500 X 500 .jpg" alt="logo">
        <h2>Login</h2>
        <form id="login-form" method="post" action="login.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="abc@gmail.com" required>
            <span id="email-error" class="error-message"></span>
            <div class="password-container">
                <label for="password">Password:</label>
                <input  type="password" id="password" name="password" placeholder="Password" required>
                <i class="fa fa-eye" id="eye" onclick="togglePassword()"></i>
                <span id="password-error" class="error-message"></span>
            </div>
            <div class="captcha-area">
                <div class="captcha-img">
                    <span class="captcha"></span>
                </div>
                <button type="button" class="reload-btn"><i class="fas fa-redo-alt"></i></button>
            </div>
            <div class="input-area">
                <input type="text" placeholder="Enter captcha" maxlength="6" spellcheck="false" required>
            </div>
            <div class="status-text"></div> 
            <button type="submit" id="login-button" disabled>Login</button>
        </form>
        <p>Don't have an account? <a href="sing in.php">Sign Up</a></p>
        <div class="forgot-password-container">
            <button id="forgot-password" onclick="redirectToForgotPassword()">Forgot Password?</button>
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
                eyeIcon.classList .remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        const captcha = document.querySelector(".captcha"),
        reloadBtn = document.querySelector(".reload-btn"),
        inputField = document.querySelector(".input-area input"),
        statusTxt = document.querySelector (".status-text"),
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