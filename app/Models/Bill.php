<?php 

class Bill {
    private $db;
    private $conn;

    public function __construct() {
        require_once __DIR__ . '/../Core/Database.php';
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function getAll($limit = null) {
        $sql = "SELECT * FROM bill ORDER BY id DESC";
        if ($limit !== null) {
            $sql .= " LIMIT ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $limit);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $result = $this->conn->query($sql);
        }

        $bills = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bills[] = $row;
            }
        }
        return $bills;
    }

    public function add($contract_id, $name, $description, $quantity, $amount, $paid_date, $vat) {
        $sql = "INSERT INTO bill (contract_id, name, description, quantity, amount, paid_date, vat, created_at, updated_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issidss", $contract_id, $name, $description, $quantity, $amount, $paid_date, $vat);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM bill WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}