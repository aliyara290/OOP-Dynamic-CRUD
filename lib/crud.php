<?php
class Crud {
    private $conn;
    private $table_name = 'joueurs';

    public function __construct($connection) {
        $this->conn = $connection;
    }

    // Add Player
    public function addPlayer($data) {
        $columns = implode(",", array_keys($data));
        $values = implode(",", array_map(fn($col) => ":$col", array_keys($data)));
        $sql = "INSERT INTO $this->table_name ($columns) VALUES ($values)";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
            echo "Added successfully";
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }

    // Update Player
    public function updatePlayer($data, $id) {
        $setClause = implode(", ", array_map(fn($col) => "$col = :$col", array_keys($data)));
        $sql = "UPDATE $this->table_name SET $setClause WHERE joueurs_id = :id";
        try {
            $stmt = $this->conn->prepare($sql);
            $data['id'] = $id;
            $stmt->execute($data);
            echo "Updated successfully";
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }

    // Delete Player
    public function deletePlayer($id) {
        $sql = "DELETE FROM $this->table_name WHERE joueurs_id = :id";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            echo "Deleted successfully";
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }

    public function getPlayer($table, $id) {
        $query = "SELECT * FROM $table WHERE joueurs_id = :id LIMIT 1";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }

    // Get All Players
    public function getAllPlayers() {
        $sql = "SELECT * FROM $this->table_name";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }
}
?>
