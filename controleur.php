<?php

include_once __DIR__ . '/php/db.php';
include_once __DIR__ . 'php/requete.php';

class AppMVC {

    private $dbb;
    private $requete;

    public function __construct() {
        $this->dbb = new POO();
        require_once __DIR__ . '/php/requete.php'; 
        $this->requete = new Requete();
    }

    public function pageAcceuil() {
        include __DIR__ . '/template/PageAcceuil.html';
        // echo "<h1>Bienvenue sur la page d'accueil (teste) </h1>";    
    }

    public function pageJouets() {
        $jouets = $this->requete->getJouets();
        include __DIR__ . '/template/PageJouets.php';
        // echo "<h1>teste affisache  </h1>";
    }

    public function pageEnfantsJouets() {
         // $liste = $this->dbb->getEnfantsAvecJouets();
        include __DIR__ . '/template/PageEnfantsJouets.php';
    }
    

}

?>
