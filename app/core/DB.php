<?php
class Connectdatabase
{
    private $host = 'localhost';
    private $db_name = '68pm34';
    private $username = 'root';
    private $password = '';
    private $charset = 'utf8mb4';
    public $conn;

    public function Connect()
    {
        $this->conn = null;

        try {
           $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';charset=' . $this->charset, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
