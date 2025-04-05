<?php
session_start();


if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}


require_once 'Book.php';


if (!isset($_GET['id'])) {
    die("Book ID is missing.");
}


$book_id = $_GET['id'];


$book = new Book();

if ($book->delete($book_id)) {
 
    header('Location: profili.php?message=Book deleted successfully');
} else {

    header('Location: profili.php?message=Failed to delete book');
}
?>