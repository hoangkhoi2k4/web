<?php

class Database {
    protected $conn;

    public function __construct() {
        $config = require __DIR__ . '/../../config/config.php';

        $this->conn = mysqli_connect(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['dbname']
        );

        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }

        $this->conn->set_charset("utf8mb4");
    }

    public function getConnection() {
        return $this->conn;
    }
}