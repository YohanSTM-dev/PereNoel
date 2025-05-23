<?php
require_once 'requete.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom_jouet']);

    if (!empty($nom)) {
        $requete = new Requete();
        $result = $requete->ajouterJouet($nom);

        if ($result) {
            header('Location: liste_jouets.php'); 
            exit;
        } else {
            echo "Erreur lors de l'ajout du jouet.";
        }
    } else {
        echo "Le nom du jouet est obligatoire.";
    }
}
?>
