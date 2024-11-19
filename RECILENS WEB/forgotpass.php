<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "recilens";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$messageType = ""; // To hold the type of message (success or error)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check password length
    if (strlen($new_password) < 6 || strlen($new_password) > 8) {
        $message = "Password must be between 6 and 8 characters.";
        $messageType = "error";
    } else {
        // Sanitize email input
        $email = $conn->real_escape_string($email);
        
        // Check if email exists
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            if ($new_password === $confirm_password) {
                // Sanitize password input (not a complete solution)
                $new_password = $conn->real_escape_string($new_password);
                
                // Update the password
                $update_query = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
                if ($conn->query($update_query) === TRUE) {
                    $message = "Password updated successfully. Redirecting to login...";
                    $messageType = "success";
                    header("refresh:2;url=loginh.php");
                    exit();
                } else {
                    $message = "Error updating password. Please try again.";
                    $messageType = "error";
                }
            } else {
                $message = "Passwords do not match.";
                $messageType = "error";
            }
        } else {
            $message = "Email not found.";
            $messageType = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            overflow: hidden; /* Prevent scrollbars */
            position: relative;
            margin: 0;
            height: 100vh; /* Full viewport height */
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%; /* Full height */
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            z-index: 0;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .floating-object {
            position: absolute;
            border-radius: 50%;
            opacity: 0.7;
            animation: float 6s infinite;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }

        /* Generate random colorful floating objects */
        .object1 { background: rgba(255, 0, 0, 0.8); width: 60px; height: 60px; top: 20%; left: 10%; animation-duration: 4s; }
        .object2 { background: rgba(0, 0, 255, 0.6); width: 80px; height:  80px; top: 40%; left: 30%; animation-duration: 5s; }
        .object3 { background: rgba(0, 255, 0, 0.5); width:  100px; height: 100px; top: 60%; left: 50%; animation-duration: 6s; }
        .object4 { background: rgba(255, 255, 0, 0.4); width: 40px; height: 40px; top: 80%; left: 70%; animation-duration: 7s; }
        .object5 { background: rgba(255, 165, 0, 0.5); width: 70px; height: 70px; top: 30%; left: 80%; animation-duration: 6s; }
        .object6 { background: rgba(75, 0, 130, 0.6); width: 90px; height: 90px; top: 50%; left: 20%; animation-duration: 5s; }

        .container {
            position: relative;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            z-index: 1; /* Ensure it is above the background */
            animation: fadeIn 0.5s;
            margin: auto; /* Center the container */
            top: 50%; /* Center vertically */
            transform: translateY(-50%); /* Adjust for vertical centering */
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .password-container{
            position: relative;
            width: 100%;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%; 
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border 0.3s;
        }

        input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #007bff;
            font-size: 18px; /* Adjust icon size */
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .alert {
            padding: 15px;
            margin-top: 15px;
            border-radius: 5px;
            display: none; /* Hidden by default */
            animation: fadeIn 0.5s;
        }

        .alert.success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="background"></div>
<div class="floating-object object1"></div>
<div class="floating-object object2"></div>
<div class="floating-object object3"></div>
<div class="floating-object object4"></div>
<div class="floating-object object5"></div>
<div class="floating-object object6"></div>

<div class="container">
    <h2>Update Password</h2>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Enter your email" required>
        <div class="password-container">
            <input type="password" name="new_password" id="new_password" placeholder="Create new password" required>
            <i class="fas fa-eye eye-icon" id="toggleNewPassword" onclick="togglePasswordVisibility('new_password', this)"></i>
        </div>
        <div class="password-container">
            <input type="password" name=" confirm_password" id="confirm_password" placeholder="Confirm new password" required>
            <i class="fas fa-eye eye-icon" id="toggleConfirmPassword" onclick="togglePasswordVisibility('confirm_password', this)"></i>
        </div>
        <button type="submit">Submit</button>
    </form>
    <?php if ($message): ?>
        <div class="alert <?php echo $messageType; ?>" style="display: block;">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
</div>

<script>
    function togglePasswordVisibility(passwordFieldId, icon) {
        const passwordField = document.getElementById(passwordFieldId);
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    setTimeout(function() {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 5000); 
</script>

</body>
</html>