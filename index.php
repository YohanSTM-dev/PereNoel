<?php

require_once __DIR__ . '/php/db.php'; 
require_once __DIR__ . '/controleur.php'; 


$bdd = new POO();


if (!isset($_GET['page'])) {
    header("Location: index.php?page=1");
    exit();
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
} 

$monapp = new AppMVC();


switch ($page) {
    case 1:
       
        $monapp->pageAcceuil();
        break;

    case 2:
       
        $monapp->pageEnfantsJouets();
        break;

    case 3: 
        $monapp -> pageJouets();
        break;

    default:
       
        $monapp->pageAcceuil();
        break;
}

// page acceuil pour 1 
// page liste des enfants et leurs jouets pour la 2 
// page des ateliers et les jouets fabriqué 
// listye des livraisons par traineau 
// lutins et leurs ateliers


?>

