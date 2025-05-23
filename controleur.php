<?php

include_once __DIR__ . '/php/db.php';

class AppMVC {

    private $dbb;

    public function __construct() {
        $this->dbb = new POO();
    }

    public function pageAcceuil() {
        include __DIR__ . '/template/PageAcceuil.html';
        // echo "<h1>Bienvenue sur la page d'accueil (teste) </h1>";    
    }

    public function pageJouets() {
        $jouet = $this -> dbb ->getjouets();
        include('/template/PageJouets.php');
        // echo "<h1>teste affisache  </h1>";
    }

    public function pageEnfantsJouets() {
         // $liste = $this->dbb->getEnfantsAvecJouets();
        include __DIR__ . '/template/PageEnfantsJouets.php';
    }
    

}

?>
