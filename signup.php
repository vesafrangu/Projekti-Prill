<?php
require_once('User.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();

    if ($user->create($username, $password,"admin")) {
        echo "User registered successfully!";
        header('location:login.php');
        exit();
    } else {
        echo "User registration failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookWorldOnline - Sign Up</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background: #34495e;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
        }

        header h1 {
            font-size: 24px;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: rgb(104, 23, 23);
        }

        .signup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #b0bec5;
        }

        .signup-form {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
        }

        .signup-form h2 {
            margin-bottom: 30px;
            color: rgb(104, 23, 23);
        }

        .signup-form input {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #95a5a6;
            border-radius: 4px;
            font-size: 18px;
        }

        .signup-form .btn {
            width: 100%;
            padding: 15px;
            background: rgb(104, 23, 23);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .signup-form .btn:hover {
            background: #7f8c8d;
        }

        .signup-form a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #34495e;
        }

        .signup-form a:hover {
            text-decoration: underline;
            color: rgb(104, 23, 23);
        }

        footer {
            background: #34495e;
            color: white;
            text-align: center;
            padding: 20px;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
            color: rgb(104, 23, 23);
        }
    </style>
</head>
<body>

    <header>
        <h1>BookWorldOnline</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="aboutUs.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <div class="signup-container">
        <div class="signup-form">
            <h2>Create a New Account</h2>
            <form action="signup_action.php" method="POST">
                <input type="text" id="name" name="fullname" placeholder="Full Name" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                <button type="submit" class="btn" id="submit-btn">Sign Up</button>
            </form>
            <a href="login.html">Already have an account? Log in here.</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 BookWorldOnline. All Rights Reserved.</p>
        <p><a href="privacy.html">Privacy Policy</a> | <a href="terms.html">Terms & Conditions</a></p>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const BtnSubmit = document.getElementById('submit-btn');
            const form = document.querySelector('form');

            BtnSubmit.addEventListener('click', function(event) {
                if (!validate()) {
                    event.preventDefault(); // Stop the form from submitting
                }
            });

            function validate() {
                const name = document.getElementById('name');
                const email = document.getElementById('email');
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('confirm_password');

                if (name.value.trim() === "") {
                    alert("Please enter your name.");
                    name.focus();
                    return false;
                }

                if (email.value.trim() === "") {
                    alert("Please enter your email.");
                    email.focus();
                    return false;
                }

                if (password.value.trim() === "") {
                    alert("Please enter your password.");
                    password.focus();
                    return false;
                }

                if (confirmPassword.value.trim() === "") {
                    alert("Please confirm your password.");
                    confirmPassword.focus();
                    return false;
                }

                if (!emailValid(email.value)) {
                    alert("Please enter a valid email.");
                    email.focus();
                    return false;
                }

                if (password.value.length < 8) {
                    alert("Password must be at least 8 characters long.");
                    password.focus();
                    return false;
                }

                if (password.value !== confirmPassword.value) {
                    alert("Passwords do not match.");
                    confirmPassword.focus();
                    return false;
                }

                return true;
            }

            function emailValid(email) {
                const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
                return emailRegex.test(email);
            }
        });
    </script>

</body>
</html>