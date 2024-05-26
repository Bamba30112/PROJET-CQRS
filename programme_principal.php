<?php
require_once 'creation_commande.php';
require_once 'lecture_tache.php';

// Fonction pour afficher le menu
function displayMenu() {
    echo "\n--- Menu ---\n";
    echo "1. Créer une nouvelle tâche\n";
    echo "2. Lire toutes les tâches\n";
    echo "3. Quitter\n";
    echo "Choisissez une option : ";
}

// Fonction pour créer une nouvelle tâche
function createTask() {
    echo "Entrez le titre de la tâche : ";
    $titre = trim(fgets(STDIN));

    echo "Entrez la description de la tâche : ";
    $description = trim(fgets(STDIN));

    $createCommand = new Commande($titre, $description);
    $createCommand->execute();
    echo "Tâche créée avec succès.\n";
}

// Fonction pour lire toutes les tâches
function readTasks() {
    $getTasksQuery = new Lecture();
    $taches = $getTasksQuery->execute();
    foreach ($taches as $tache) {
        echo "ID tache : {$tache['id']}, Titre: {$tache['titre']}, Description: {$tache['description']}\n";
    }
}

// Boucle principale pour interagir avec l'utilisateur
do {
    displayMenu();
    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case '1':
            createTask();
            break;
        case '2':
            readTasks();
            break;
        case '3':
            echo "Au revoir!\n";
            exit;
        default:
            echo "Option invalide. Veuillez réessayer.\n";
    }
} while (true);
?>
