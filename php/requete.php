<?php
class Requete {

    private $bdd;

    public function __construct() {
        $this->bdd = new POO();
    }

    public function getJouets() {
        $stmt = $this->bdd->query('SELECT * FROM jouets');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
