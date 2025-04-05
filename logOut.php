<?php
require_once 'User.php'; 

$user = new User();

if ($user->logout()) {
    header("Location: login.php"); 
    exit();
} else {
    echo "Logout failed.";
}
?>