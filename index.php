<?php
require_once 'DbConnect.php';  
$dbConnect = new DbConnect();
$conn = $dbConnect->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addBook'])) {
        $book_title = $_POST['title'];
        $book_author = $_POST['author'];
        $book_image = $_POST['image'];

        $sql = "INSERT INTO books (title, author, image) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$book_title, $book_author, $book_image]);
    }

    if (isset($_POST['deleteBook'])) {
        $book_id = $_POST['book_id'];

        $sql = "DELETE FROM books WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$book_id]);
    }
}

$sql = "SELECT * FROM books";
$stmt = $conn->prepare($sql);
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookWorldOnline</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background: #34495e;  
            color: #dad8d8;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
            border-bottom: 2px solid #7f8c8d; 
        }

        header h1 {
            font-size: 24px;
            font-family: 'Arial', sans-serif;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: #dad8d8;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }

        nav ul li a:hover {
            text-decoration: underline;
            color: #95a5a6;  
        }

        .hero {
            text-align: center;
            padding: 50px;
            background:#d2d3d3;  
            border-radius: 8px;
        }

        .hero h2 {
            font-size: 32px;
            color: rgb(104, 23, 23);  
            font-weight: bold;
        }

        .hero p {
            font-size: 20px;
            color: #2c3e50;  
            margin-top: 10px;
        }

        .recommended {
            text-align: center;
            padding: 40px;
            background: #c8c7c7;  
            margin-top: 20px;
            border-radius: 8px;
        }

        .recommended h2 {
            margin-bottom: 40px;
            color: rgb(104, 23, 23);  
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        .books {
            display: flex;
            justify-content: space-evenly;
            gap: 20px;
            flex-wrap: nowrap;  
            overflow-x: auto;  
            margin-top: 20px;
        }

        .book {
            width: 120px;  
            text-align: center;
            transition: transform 0.2s ease-in-out;
            flex: 0 0 auto;  
        }

        .book img {
            width: 100%;
            border-radius: 5px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .book:hover img {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<header>
    <h1>BookWorldOnline</h1>
    <nav>
        <ul>
            <li><a href="services.html">Services</a></li>
            <li><a href="aboutUs.html">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
        </ul>
    </nav>
</header>

<section>
    <h2>Add New Book</h2>
    <form method="POST" action="">
        <input type="text" name="title" placeholder="Book Title" required>
        <input type="text" name="author" placeholder="Book Author" required>
        <input type="text" name="image" placeholder="Book Image URL" required>
        <button type="submit" name="addBook">Add Book</button>
    </form>
</section>

<section class="recommended">
    <h2>Recommended Books</h2>
    <div class="books">
        <?php foreach ($books as $book): ?>
            <div class="book">
                <img src="<?php echo htmlspecialchars($book['image']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
                <h3><?php echo htmlspecialchars($book['title']); ?></h3>
                <p><em>by <?php echo htmlspecialchars($book['author']); ?></em></p>
                <form method="POST" action="">
                    <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                    <button type="submit" name="deleteBook">Delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</section>

</body>
</html>