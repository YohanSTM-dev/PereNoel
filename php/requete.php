<?php
class Requete {

    private $bdd;

    public function __construct() {
        $this->bdd = new POO();
    }

    public function getBddConnection() {
        return $this->bdd->getConnection();
    }
    

    public function getJouets() {
        $query = "SELECT * FROM jouets";
        $result = $this->connection->query($query);
    
        $jouets = [];
    
        while ($row = $result->fetch_assoc()) {
            $jouets[] = $row;
        }
    
        return $jouets;
    }
    
    public function getEnfantsAvecJouets() {
        $query = "
            SELECT e.nom AS nom_enfant, e.prenom, j.nom AS nom_jouet
            FROM enfants e
            JOIN listejouets lj ON e.id = lj.enfant_id
            JOIN jouets j ON lj.jouet_id = j.id
            ORDER BY e.nom, e.prenom;
        ";

        $result = $this->bdd->getConnection()->query($query);
        $data = [];
    
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    
        return $data;
    }
    
}
?>
