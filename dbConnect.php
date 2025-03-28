<?php
class DbConnect{
    private $host = 'localhost';  
    private $dbname = 'booksworldonline';    
    private $user = 'root';           
    private $pass = '';                

    public function connect() {
        try {
         
            $conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Lidhja u krijua me sukses!";  
            return $conn;
        } catch (PDOException $e) {
            echo 'database error: ' . $e->getMessage();
        }
    }
}

$db = new DbConnect();
$db->connect();
?>