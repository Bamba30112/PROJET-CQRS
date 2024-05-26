<?php
require_once 'base_donnee.php';

class Lecture {
    public function execute() {
        try {
            $pdo = Database::getInstance()->getConnection();
            $stmt = $pdo->query("SELECT * FROM tache");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error executing query: " . $e->getMessage());
        }
    }
}
?>
