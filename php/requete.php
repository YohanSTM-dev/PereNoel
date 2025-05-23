<?php
class Requete {

    private $bdd;

    public function __construct() {
        $this->bdd = new POO();
    }

    public function getBddConnection() {
        return $this->bdd->getConnection();
    }
    

    public function getJouetsUniquement() {
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

    public function ajouterJouet(string $nom) {
        $conn = $this->bdd->getConnection();
        $stmt = $conn->prepare("INSERT INTO jouets (nom) VALUES (?)");
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("s", $nom);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    public function getJouets() {
        $conn = $this->bdd->getConnection();
        $query = "SELECT * FROM jouets ORDER BY nom";
        $result = $conn->query($query);
    
        $jouets = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $jouets[] = $row;
            }
        }
        return $jouets;
    }
    
    
    
}
?>
