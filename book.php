<?php
require_once('DbConnect.php'); 

class Book {
    private $dbConn;
    private $table = 'books'; 

    public function __construct() {
        $db = new DbConnect();
        $this->dbConn = $db->connect();
    }


    public function create($title, $author, $price, $description,$image) {
        $sql = "INSERT INTO $this->table (title, author, price, description, image) VALUES (:title, :author, :price, :description,:image)";
        $stmt = $this->dbConn->prepare($sql);

   
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getBooksByUser($username) {
        $sql = "SELECT * FROM $this->table WHERE username = :username";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function update($title, $author, $price, $image) {
        $sql = "UPDATE $this->table SET title = :title, author = :author, image = :image WHERE id = :book_id";
        $stmt = $this->dbConn->prepare($sql);


        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':book_id', $book_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function delete($book_id) {
        $sql = "DELETE FROM $this->table WHERE id = :book_id";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->bindParam(':book_id', $book_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


public function getBookById($car_id) {
    $sql = "SELECT * FROM $this->table WHERE id = :book_id";
    $stmt = $this->dbConn->prepare($sql);
    $stmt->bindParam(':book_id', $book_id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function getAllBooksByUser() {
    $sql = "SELECT * FROM $this->table";
    $stmt = $this->dbConn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>