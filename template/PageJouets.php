<!DOCTYPE html>
<html>
<head>
    <title>Liste des Jouets</title>
</head>
<body>
    <h1>Les jouets du Père Noël</h1>
    <ul>
        <?php foreach ($jouets as $jouet): ?>
            <li>
                <h2><?= htmlspecialchars($jouet['nom']) ?></h2>
                <p><?= htmlspecialchars($jouet['description']) ?></p>
                <p>Prix : <?= htmlspecialchars($jouet['prix']) ?> €</p>
                <?php if (!empty($jouet['image'])): ?>
                    <img src="<?= htmlspecialchars($jouet['image']) ?>" alt="<?= htmlspecialchars($jouet['nom']) ?>" style="max-width:200px;">
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
