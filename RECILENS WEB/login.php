<?php
session_start(); 

$host = 'localhost';
$dbname = 'recilens';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($password === $user['password']) {
            $_SESSION['first_name'] = $user['first_name']; 
            $_SESSION['email'] = $user['email']; 
            echo json_encode(['success' => true, 'first_name' => $user['first_name']]);
        } else {
            echo json_encode(['success' => false, 'error' => 'password']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'email']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'connection', 'message' => $e->getMessage()]);
}
?>