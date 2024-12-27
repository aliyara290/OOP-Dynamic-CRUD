<?php 
class Database {
    private $host = 'localhost';
    private $db_name = 'joueurs_db';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function getConnection() {
        $this->conn = NULL;
        try {
            $this->conn = new PDO("mysql:host=$this->host; dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $error) {
            echo "failed to connect" . $error->getMessage();
        }
        return $this->conn;
    }   
};