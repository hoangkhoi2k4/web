<?php

class Contract {
    private $db;
    private $conn;

    public function __construct() {
        require_once __DIR__ . '/../Core/Database.php';
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function getAll($limit = null) {
        $sql = "SELECT * FROM contract ORDER BY id DESC";
        if ($limit !== null) {
            $sql .= " LIMIT ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $limit);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $result = $this->conn->query($sql);
        }

        $contracts = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contracts[] = $row;
            }
        }
        return $contracts;
    }

    public function countExpiringInOneMonth() {
        $sql = "SELECT COUNT(*) as count FROM contract WHERE expire_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 MONTH)";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['count'];
        }
        return 0;
    }

    public function countByProvider($provider_id) {
        $sql = "SELECT COUNT(*) as count FROM contract WHERE provider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $provider_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['count'];
        }
        return 0;
    }

    public function getTopProvidersByAvg($limit = 3) {
        $sql = "SELECT 
                    p.id AS provider_id,
                    p.name AS provider_name,
                    AVG(pr.avg) AS avg_score,
                    COUNT(*) AS total_contracts
                FROM provider p
                JOIN contract c ON c.provider_id = p.id
                JOIN progress pr ON pr.contract_id = c.id
                GROUP BY p.id
                ORDER BY avg_score DESC
                LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getById($id) {
        $sql = "SELECT * FROM contract WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return ($result && $result->num_rows > 0) ? $result->fetch_assoc() : null;
    }

    public function add($provider_id, $service_id, $name, $price, $unit, $signed_date, $exp_date, $name_supplier, $phone_supplier) {
        $sql = "INSERT INTO contract (provider_id, service_id, name, price, unit, signed_date, expire_date, name_supplier, phone_supplier, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iisdsssss", $provider_id, $service_id, $name, $price, $unit, $signed_date, $exp_date, $name_supplier, $phone_supplier);
        return $stmt->execute();
    }

    public function update($id, $provider_id, $service_id, $name, $price, $unit, $signed_date, $exp_date, $name_supplier, $phone_supplier) {
        $sql = "UPDATE contract SET provider_id=?, service_id=?, name=?, price=?, unit=?, signed_date=?, expire_date=?, name_supplier=?, phone_supplier=?, updated_at=NOW() WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iisdsssssi", $provider_id, $service_id, $name, $price, $unit, $signed_date, $exp_date, $name_supplier, $phone_supplier, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM contract WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function searchByName($keyword) {
        $sql = "SELECT * FROM contract WHERE name LIKE ? ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $like = '%' . $keyword . '%';
        $stmt->bind_param("s", $like);
        $stmt->execute();
        $result = $stmt->get_result();
        $contracts = [];
        while ($row = $result->fetch_assoc()) {
            $contracts[] = $row;
        }
        return $contracts;
    }
}