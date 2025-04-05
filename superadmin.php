<?php
session_start();
require_once('User.php');
require_once('Book.php'); 



$user = new User();
$users = $user->getAllUsers();

$Book = new Book();
$books = $Book->getAllBooksByUser(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminiKryesor</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fb;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            border-bottom: 2px solid #ccc;
        }

        .dashboard-header h2 {
            margin: 0;
            color: #2c3e50;
        }

        .button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        td {
            background-color: #fff;
        }

        td a {
            color: #3498db;
            text-decoration: none;
            margin-right: 10px;
        }

        td a:hover {
            text-decoration: underline;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            margin-top: 0;
            color: #333;
        }

        label {
            font-weight: 500;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input:focus, select:focus {
            border-color: #3498db;
            outline: none;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="dashboard-header">
        <h2>AdminiKryesor</h2>
        <a href="logout.php" class="button">Logout</a>
    </div>

    
    <h2>All Users</h2>
    <div class="container">
    <div class="dashboard-header">
        <h2>AdminiKryesor</h2>
        <a href="logOut.php" class="button">Logout</a>
    </div>

    <h2>All Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Books</th> 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                    <td>
                        <?php 
                            foreach ($books as $book) {
                                if ($book['username'] === $user['username']) {
                                    echo htmlspecialchars($book['title']) . ' (' . htmlspecialchars($car['author']) . ')<br>';
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <form action="update.php" method="GET" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                            <button type="submit" class="button">Edit</button>
                        </form>

                        <form action="delete.php" method="POST" style="display:inline;">
                            <input type="hidden" name="username" value="<?php echo $user['username']; ?>">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this user?');" class="button">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <div class="form-container">
        <h3>Create New User</h3>
        <form action="create_user.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit" class="button">Create User</button>
        </form>
    </div>
</div>

</body>
</html>