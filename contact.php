<?php
require_once('User.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $user = new User();

    if ($user->sendMessage($name, $email,$message)) {
        echo "sent successfully!";
        header('location:contact.php');
        exit();
    } else {
        echo "User registration failed!";
    }
}
?>

<!DOCTYPE html> 
<html lang="en" dir="ltr"> 
<head> 
    <meta charset="UTF-8" /> 
    <title>Contact Us - BookWorldOnline</title> 
    <link rel="stylesheet" href="contact.css" /> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <style>
        body {
            font-family: 'Poppins', sans-serif; 
            background-color: #dad8d8; 
            margin: 0; 
            padding: 0; 
        }
        header { 
            background-color: #2c3e50;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }
        .logo { 
            font-size: 24px;
            font-weight: normal;
            color: white;
            text-decoration: none;
        }
        .navigation {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .navigation a {
            font-size: 1em;
            color: white;
            text-decoration: none;
            font-weight: normal;
        }
        .navigation a:hover {
            color: rgb(104, 23, 23); 
        }

        .navigation a.signup,
        .navigation a.login {
            background-color: #95a5a6;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-left: 5px;
        }

        .navigation a.signup:hover,
        .navigation a.login:hover {
            background-color: #373839;
        }

        .container { 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            gap: 20px;
        }
        .content { 
            display: flex;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 75%;
            max-width: 1000px;
            margin: 0 auto;
        }
        .left-side, .right-side {
            padding: 15px;
            width: 50%;
        }
        .left-side {
            padding-right: 15px;
        }
        .right-side {
            padding-left: 15px;
        }
        .topic {
            font-weight: 600;
            color: #34495e;
        }
        .topic-text {
            font-weight: bold; 
            color : rgb(104, 23, 23); 
            font-size: 25px;
        }
        .text {
            color: #7f8c8d;
        }
        .input-box input, .input-box textarea {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: 1px solid #95a5a6;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .input-box textarea {
            height: 100px;
        }
        .send-button {
            background-color: rgb(104, 23, 23);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        .send-button:hover {
            background-color: #3498db; 
            color: white; 
            transform: scale(1.1); 
            transition: all 0.3s ease;
        }
        footer {
            background: #34495e;
            color: white;
            text-align: center;
            padding: 5px 20px;
            font-size: 13px;
        }
        footer a {
            color: white;
            text-decoration: none;
            font-weight: normal;
        }
        footer a:hover {
            text-decoration: underline;
            color: rgb(104, 23, 23); 
        }
        .details {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <a href="index.html" class="logo">BookWorldOnline</a>
        <nav class="navigation">
            <a href="services.html">Services</a>
            <a href="aboutUs.html">About Us</a> 
            <a href="login.html" class="login">Login</a>
            <a href="signup.html" class="signup">Sign Up</a>
        </nav>
    </header>

    <div class="container">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <div class="topic">Address</div>
                    <div class="text">Prishtinë</div>
                </div>
                <div class="phone details">
                    <div class="topic">Phone</div>
                    <div class="text">+383 44 123 456</div>
                </div>
                <div class="email details">
                    <div class="topic">Email</div>
                    <div class="text">bookworldonline@yahoo.com</div>
                </div>
            </div>

            <div class="right-side">
                <div class="topic-text">Send us a message</div>
                <p>If you have any questions or requests, let us know.</p>
                <form action="contact.php" method="POST">
                    <div class="input-box">
                        <input type="text" placeholder="Enter your name" name="name" required />
                    </div>
                    <div class="input-box">
                        <input type="email" placeholder="Enter your email" name="email" required />
                    </div>
                    <div class="input-box message-box">
                        <textarea placeholder="Enter your message" name="message" required></textarea>
                    </div>
                    <div class="button-container">
                        <input type="submit" value="Send Now" class="send-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 BookWorldOnline. All Rights Reserved.</p>
        <p><a href="privacy.html">Privacy Policy</a> | <a href="terms.html">Terms & Conditions</a></p>
    </footer>
</body>
</html>