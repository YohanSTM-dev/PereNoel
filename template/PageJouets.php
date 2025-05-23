<?php
include_once __DIR__ . '../php/requete.php';

$requete = new Requete();
$jouets = $requete->getJouets();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Jouets</title>
    <link rel="stylesheet" href="/css/styleCSS.css">
    <style>
        table { border-collapse: collapse; width: 50%; margin: auto; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Liste des Jouets</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom du Jouet</th>
        </tr>
        <?php foreach ($jouets as $jouet): ?>
            <tr>
                <td><?= htmlspecialchars($jouet['id']) ?></td>
                <td><?= htmlspecialchars($jouet['nom']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
