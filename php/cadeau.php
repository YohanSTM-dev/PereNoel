<?php

include_once __DIR__ . "/php/db.php";

require_once 'Requete.php';


$req = new Requete($pdo);

$jouets = $req->getJouets();


foreach ($jouets as $jouet) {
    echo htmlspecialchars($jouet['nom']) . "<br>";
}
