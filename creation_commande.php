<?php
    require_once 'base_donnee.php';

    class Commande {
        private $titre;
        private $description;

        public function __construct($titre, $description) {
            $this->titre = $titre;
            $this->description = $description;
        }

        public function execute() {
            try {
                $pdo = Database::getInstance()->getConnection();
                $stmt = $pdo->prepare("INSERT INTO tache (titre, description) VALUES (:titre, :description)");
                $stmt->bindParam(':titre', $this->titre);
                $stmt->bindParam(':description', $this->description);
                $stmt->execute();
            } catch (PDOException $e) {
                die("Error executing query: " . $e->getMessage());
            }
        }
    }
?>
