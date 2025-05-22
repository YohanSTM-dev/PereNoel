<?php

include("/controleur.php");
include("php/db.php");

$bdd = new POO();


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
       
        $monapp->page2();
        break;

    case 3: 
        $monapp -> page3();
        break;

    default:
       
        $monapp->pagePrincipal();
        break;
}
?>