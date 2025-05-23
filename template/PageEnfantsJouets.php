<?php
require_once __DIR__ . '/../php/db.php';
    
require_once __DIR__ .  '/../php/requete.php';  

$req = new Requete();
$liste = $req->getEnfantsAvecJouets();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Jouets demandés</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: auto; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">🎁 Jouets demandés par les enfants 🎄</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Jouet demandé</th>
        </tr>
        <?php foreach ($liste as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['nom_enfant']) ?></td>
            <td><?= htmlspecialchars($row['prenom']) ?></td>
            <td><?= htmlspecialchars($row['nom_jouet']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
