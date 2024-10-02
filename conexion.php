<?php
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct(){
        $this->host = "localhost";//"sql5.freemysqlhosting.net";
        $this->db_name = "sql5734574";
        $this->username = "sql5734574";
        $this->password = "dq2tdplSjH";
        $this->conn = null;
    }

    public function getConnection() {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Database error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>