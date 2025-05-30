<?php 

class Provider {
    private $db;
    private $conn;

    public function __construct() {
        require_once ROOT_PATH . '/app/Core/Database.php';
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

     public function getAll($limit = null) {
        $sql = "SELECT * FROM provider ORDER BY id DESC";
        if ($limit !== null) {
            $sql .= " LIMIT ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $limit);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $result = $this->conn->query($sql);
        }

        $suppliers = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $suppliers[] = $row;
            }
        }
        return $suppliers;
    }

    public function count() {
        $sql = "SELECT COUNT(*) as count FROM provider";
        $result = $this->conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['count'];
        }
        return 0;
    }

    public function getProviderById($id) {
        $sql = "SELECT * FROM provider WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function add($name, $taxcode, $description, $status, $address, $phone, $email) {
        $sql = "INSERT INTO provider (name, taxcode, description, status, address, phone, email, created_at, updated_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssss", $name, $taxcode, $description, $status, $address, $phone, $email);
        return $stmt->execute();
    }

    public function update($id, $name, $taxcode, $description, $status, $address, $phone, $email) {
        $sql = "UPDATE provider SET name = ?, taxcode = ?, description = ?, status = ?, address = ?, phone = ?, email = ?, updated_at = NOW() WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssssi", $name, $taxcode, $description, $status, $address, $phone, $email, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM provider WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}