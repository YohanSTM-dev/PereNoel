<?php
require_once 'bdd.php'; // ta classe Database

$db = new Database();
$conn = $db->connexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $age = intval($_POST['age']);
    $adresse = htmlspecialchars(trim($_POST['adresse']));
    $message = htmlspecialchars(trim($_POST['message']));

    $stmt = $conn->prepare("INSERT INTO adresses (adresse) VALUES (?)");
    $stmt->bind_param("s", $adresse);
    $stmt->execute();
    $idadresse = $stmt->insert_id;
    $stmt->close();

    $stmt2 = $conn->prepare("INSERT INTO enfants (nom, prenom, age, idadresse) VALUES (?, ?, ?, ?)");
    $stmt2->bind_param("ssii", $nom, $prenom, $age, $idadresse);
    $stmt2->execute();
    $stmt2->close();



    echo "🎅 Merci de ta lettre !";
} else {
    echo "❌ Méthode non autorisée.";
}
?>
