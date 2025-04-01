<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stored_email = "example@example.com";
    $stored_hashed_password = password_hash("password123", PASSWORD_DEFAULT);

    if ($email == $stored_email && password_verify($password, $stored_hashed_password)) {
        $_SESSION['user'] = $email; 
        echo "Login successful!";
    } else {
        echo "Email or password is error";
    }
}
?>