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
    <link rel="stylesheet" href="loader.css">
    <style>
        /* Basic Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden;
    position: relative;
}

/* Video Background */
#myVideo {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%;
    min-height: 100%;
    z-index: -1;
    filter: brightness(60%);
}

/* Background Animation */
body::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 300vw;
    height: 300vw;
    background: radial-gradient(circle, rgba(0, 183, 255, 0.5), rgba(0, 0, 0, 0));
    z-index: -1;
    animation: pulseBackground 20s infinite ease-in-out;
    transform: translate(-50%, -50%);
}

/* Pulse Animation for Background */
@keyframes pulseBackground {
    0% { transform: translate(-50%, -50%) scale(1); }
    50% { transform: translate(-50%, -50%) scale(1.5); }
    100% { transform: translate(-50%, -50%) scale(1); }
}

/* Container for the login form */
.login-container {
    background: rgba(255, 255, 255, 0.85);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.3), 0 0 30px rgba(255, 255, 255, 0.1);
    text-align: center;
    width: 300px;
    transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
}

.login-container:hover {
    transform: scale(1.05);
    box-shadow: 0 0 40px rgba(255, 255, 255, 0.7), 0 0 80px rgba(0, 183, 255, 0.5);
}

.login-container img {
    animation: bounceIn 1s ease-out;
    width: 60px;
    height: auto;
}

/* Bounce Animation for Logo */
@keyframes bounceIn {
    0% { transform: scale(0.5); opacity: 0; }
    80% { transform: scale(1.1); opacity: 1; }
    100% { transform: scale(1); }
}

/* Heading Style */
h2 {
    margin-bottom: 15px;
    color: #333;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 1.5em;
    animation: slideIn 1s ease-in-out;
}

/* Slide-in Animation for Heading */
@keyframes slideIn {
    from { transform: translateY(-100px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

/* Form Styling */
#login-form {
    margin: 0;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

/* Input Fields Styling */
input[type="email"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    background: rgba(255, 255, 255, 0.7);
    box-sizing: border-box;
}

/* Focus Effect on Input Fields */
input[type="email"]:focus, input[type="password"]:focus {
    border-color: #00b7ff;
    box-shadow: 0px 0px 10px rgba(0, 183, 255, 0.5);
    background: rgba(255, 255, 255, 0.9);
}

/* Password Input Styling */
.password-container {
    position: relative;
    width: 113%;
    margin-bottom: 20px;
    margin-left: -6%;
}

.password-container input {
    width: 100%;
    padding: 10px;
    padding-right: 40px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.password-container input:focus {
    border-color: #00b7ff;
    box-shadow: 0 0 5px rgba(0, 183, 255, 0.5);
}

/* Eye Icon for Password Toggle */
.password-container i {
    position: absolute;
    right: 30px;
    top: 60%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #888;
    font-size: 18px;
    transition: color 0.3s ease;
}

.password-container i:hover {
    color: #00b7ff;
}

/* Button Styling */
button {
    width: 100%;
    padding: 12px;
    background-color: #00b7ff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: background-color 0.4s ease, box-shadow 0.4s ease, transform 0.4s ease;
}

button:hover {
    background-color: #0288d1;
    box-shadow: 0px 5px 10px rgba(0, 183, 255, 0.6);
    transform: translateY(-10px);
}

/* Button Hover Effects */
button:hover::after {
    content: '';
    position: absolute;
    left: 50%;
    top: 50%;
    width: 100%;
    height: 80%;
    background: rgba(0, 183, 255, 0.2);
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: transform 0.4s ease;
    z-index: -1;
    pointer-events: none;
}

button:hover::after {
    transform: translate(-50%, -50%) scale(1);
}

/* Success and Error Messages */
.success-message, .error-message {
    display: none;
    padding: 10px;
    border-radius: 5px;
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    width: 80%;
    z-index: 999;
    text-align: center;
    font-size: 16px;
}

/* Success Message */
.success-message {
    background-color: #4CAF50;
    color: white;
    animation: successPopup 3s forwards;
}

/* Error Message */
.error-message {
    background-color: #f44336;
    color: white;
    animation: errorPopup 3s forwards;
}

/* Success Message Animation */
@keyframes successPopup {
    0% {
        opacity: 0;
        transform: translateX(-50%) translateY(-30px);
    }
    50% {
        opacity: 1;
        transform: translateX(-50%) translateY(10px);
    }
    100% {
        opacity: 0;
        transform: translateX(-50%) translateY(-30px);
    }
}

/* Error Message Animation */
@keyframes errorPopup {
    0% {
        opacity: 0;
        transform: translateX(-50%) translateY(-30px);
        border-top: 5px solid transparent;
    }
    50% {
        opacity: 1;
        transform: translateX(-50%) translateY(10px);
        border-top: 5px solid #ff6347;
    }
    100% {
        opacity: 0;
        transform: translateX(-50%) translateY(-30px);
    }
}

/* Error Message Styling */
.error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
    display: none;
}

.error-popup {
    animation: popup 0.3s ease-in-out;
}

@keyframes popup {
    from { transform: scale(0); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

/* Link Styling for Sign Up */
.login-container p a {
    color: #00b7ff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.login-container p a:hover {
    color: #0288d1;
    text-decoration: underline;
}

/* Background Particles */
body::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
    background-image: url('particles.png');
    opacity: 0.3;
    animation: moveParticles 20s linear infinite;
}

@keyframes moveParticles {
    from { background-position: 0 0; }
    to { background-position: 100% 100%; }
}

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