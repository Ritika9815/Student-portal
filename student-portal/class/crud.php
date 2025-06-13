<?php
require_once __DIR__ . '/database.php';


class crud {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getData($query) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Fetch Error: " . $e->getMessage();
            return false;
        }
    }

    public function execute($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            echo "Execution Error: " . $e->getMessage();
            return false;
        }
    }
}
?>



