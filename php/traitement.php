<?php
require_once 'bdd.php'; // ta classe Database

$db = new Database();
$conn = $db->connexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $age = intval($_POST['age']);
    $adresse = htmlspecialchars(trim($_POST['adresse']));
    $message = htmlspecialchars(trim($_POST['message']));

    // 1. Insertion adresse
    $stmt = $conn->prepare("INSERT INTO adresses (adresse) VALUES (?)");
    $stmt->bind_param("s", $adresse);
    $stmt->execute();
    $idadresse = $stmt->insert_id;
    $stmt->close();

    // 2. Insertion enfant
    $stmt2 = $conn->prepare("INSERT INTO enfants (nom, prenom, age, idadresse) VALUES (?, ?, ?, ?)");
    $stmt2->bind_param("ssii", $nom, $prenom, $age, $idadresse);
    $stmt2->execute();
    $idenfant = $stmt2->insert_id;
    $stmt2->close();

    // 3. Insertion lettre
    $stmt3 = $conn->prepare("INSERT INTO lettres (lettre, id_enfant) VALUES (?, ?)");
    $stmt3->bind_param("si", $message, $idenfant);
    $stmt3->execute();
    $stmt3->close();

    // 4. Envoi au serveur syslog
    $ip_syslog = "172.16.117.1"; // IP de ton serveur syslog
    $port = 514;
    $syslog_message = "<13>" . date('M d H:i:s') . " Lettre créée par $prenom  $nom";

    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    if ($sock === false) {
        echo "Erreur socket_create : " . socket_strerror(socket_last_error()) . "\n";
        exit;
    }

    socket_sendto($sock, $syslog_message, strlen($syslog_message), 0, $ip_syslog, $port);
    socket_close($sock);

    echo "🎅 Merci de ta lettre !";
    echo "<br>📨 Message envoyé vers $ip_syslog:$port";
} else {
    echo "❌ Méthode non autorisée.";
}
?>
