<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "prezante44";
    private $db = "login_system";
    private $conn;

    public function getConnection() {
        if ($this->conn == null) {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

            if ($this->conn->connect_error) {
                die("Erro na conexão: " . $this->conn->connect_error);
            }
        }
        return $this->conn;
    }
}