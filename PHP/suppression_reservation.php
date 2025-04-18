<!--
Cette page permet de supprimer une réservation d'un utilisateur.
Elle vérifie d'abord si l'utilisateur est connecté, puis elle récupère l'ID de la réservation à supprimer.
Ensuite, elle se connecte à la base de données et exécute une requête pour supprimer la réservation correspondante.
Enfin, elle redirige l'utilisateur vers la page des réservations.
--> 

<?php
session_start(); // Démarre la session
if (!isset($_SESSION['id_utilisateur'])) { // Vérifie si l'utilisateur est connecté
    die("Utilisateur non connecté.");
}

$id_utilisateur = $_SESSION['id_utilisateur']; // Récupère l'ID de l'utilisateur depuis la session
$id_reservation = isset($_GET['id']) ? intval($_GET['id']) : 0; // Récupère l'ID de la réservation depuis l'URL

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
    $sql = "DELETE FROM reserve WHERE idreserve = ? AND id_utilisateur = ?"; // Prépare la requête pour éviter les injections SQL
    $stmt = $conn->prepare($sql); // Prépare la requête
    $stmt->bind_param("ii", $id_reservation, $id_utilisateur);  // Lie les paramètres à la requête préparée
    $stmt->execute(); // Exécute la requête

    // Redirection après suppression
    header("Location: reservations.php");
    exit();
}
?>
