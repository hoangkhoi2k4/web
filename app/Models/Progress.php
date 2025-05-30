<?php

class Progress {
    private $db;
    private $conn;

    public function __construct() {
        require_once __DIR__ . '/../Core/Database.php';
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function getAll($limit = null) {
        $sql = "SELECT * FROM progress ORDER BY id DESC";
        if ($limit !== null) {
            $sql .= " LIMIT ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $limit);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $result = $this->conn->query($sql);
        }

        $progresses = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $progresses[] = $row;
            }
        }
        return $progresses;
    }

    public function getById($id) {
        $sql = "SELECT * FROM progress WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return ($result && $result->num_rows > 0) ? $result->fetch_assoc() : null;
    }

    public function add($contract_id, $progress, $avg, $description) {
        $sql = "INSERT INTO progress (contract_id, progress, avg, description) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iids", $contract_id, $progress, $avg, $description);
        return $stmt->execute();
    }

    public function update($id, $contract_id, $progress, $avg, $description) {
        $sql = "UPDATE progress SET contract_id = ?, progress = ?, avg = ?, description = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iidsi", $contract_id, $progress, $avg, $description, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM progress WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}