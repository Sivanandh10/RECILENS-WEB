<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recilens";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location.href='signup.html';</script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql ="INSERT INTO users (first_name, last_name, email, mobile, password) VALUES ('$first_name','$last_name','$email','$mobile','$password')";

    if ($conn->query($sql)=== true) {
        echo "<script>alert('Welcome, sign-up successful!!'); window.location.href='loginh.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='signup.html';</script>";
    }

    $conn->close();
}
?>
