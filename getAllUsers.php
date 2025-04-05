public function getAllUsers() {
    $sql = "SELECT id, username, role FROM registration"; 

    try {
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return [];
    }
}