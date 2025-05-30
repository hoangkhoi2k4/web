<?php 


class User {
    private $db;
    private $conn;

    public function __construct() {
        require_once ROOT_PATH . '/app/Core/Database.php';
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}