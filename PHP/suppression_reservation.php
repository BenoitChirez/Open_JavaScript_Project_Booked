<?php
session_start();
if (!isset($_SESSION['id_utilisateur'])) {
    die("Utilisateur non connecté.");
}

$id_utilisateur = $_SESSION['id_utilisateur'];
$id_reservation = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_reservation > 0) {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "projet_books";
    $port = 8889;

    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Requête pour supprimer la réservation
    $sql = "DELETE FROM reserve WHERE idreserve = ? AND id_utilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_reservation, $id_utilisateur);
    $stmt->execute();

    // Redirection après suppression
    header("Location: reservations.php");
    exit();
}
?>
