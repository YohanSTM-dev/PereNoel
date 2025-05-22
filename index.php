<?php

require_once __DIR__ . '/php/db.php'; 
require_once __DIR__ . '/controleur.php'; 


$bdd = new POO();


if (!isset($_GET['page'])) {
    header("Location: index.php?page=1");
    exit();
}

$monapp = new AppMVC();


switch ($page) {
    case 1:
       
        $monapp->pageAcceuil();
        break;

    case 2:
       
        $monapp->pageJouets();
        break;

    case 3: 
        $monapp -> page3();
        break;

    default:
       
        $monapp->pagePrincipal();
        break;
}
?>