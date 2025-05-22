<?php

include_once __DIR__ . '/php/db.php';

class AppMVC {

    private $dbb;

    public function __construct() {
        $this->dbb = new POO();
    }

    public function pageAcceuil() {
        include __DIR__ . './template/PageAcceuil.html';
        echo "<p> oaoaoaoa </p>";
    }

    public function pageJouets() {
        include __DIR__ . './php/cadeau.php';
    }

}

?>
