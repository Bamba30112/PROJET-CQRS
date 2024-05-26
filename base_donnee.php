<?php
// fichier permmettant la configuration de la base de donnéd
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        try {
            $this->pdo = new PDO('sqlite:tache.db');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->createTable();
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }

    private function createTable() {
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS tache (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                titre TEXT,
                description TEXT
            )
        ");
    }
}
?>
