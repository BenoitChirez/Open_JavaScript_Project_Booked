<?php
session_start();
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['id_utilisateur'])) {
    die("Utilisateur non connecté.");
}

$id_utilisateur = $_SESSION['id_utilisateur'];

// Requête pour récupérer les réservations de l'utilisateur connecté
$sql = "SELECT livre.nom_livre, livre.nom_auteur, reserve.j_debut, reserve.j_fin, reserve.idreserve
        FROM reserve
        JOIN livre ON reserve.id_livre = livre.id_livre
        WHERE reserve.id_utilisateur = ?";
$stmt = $conn->prepare($sql); // Prépare la requête
$stmt->bind_param("i", $id_utilisateur); // Lie le paramètre
$stmt->execute(); // Exécute la requête
$result = $stmt->get_result(); // Récupère le résultat
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Vos réservations </title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/Reservation.css" /> <!-- Feuille de style pour la page des réservations -->
    <link rel="stylesheet" type="text/css" href="../CSS/Footer.css" /> <!-- Feuille de style pour le pied de page -->
    <link rel="stylesheet" type="text/css" href="../CSS/Header.css" /> <!-- Feuille de style pour l'en-tête -->
</head>
<body>
<?php include 'header.php'; ?>

<main> <!-- Contenu principal de la page -->
    <h2 id="titreReservations">Mes Réservations</h2>
    
    <!-- Tableau des réservations -->
    <table class="table table_reservation">
        <thead> <!-- En-tête de la table -->
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date réservation</th>
                <th>Fin de la réservation</th>
                <th>Annuler la réservation</th>
            </tr>
        </thead>
        <tbody> <!-- Corps de la table -->
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?> <!-- Boucle pour afficher chaque réservation -->
                    <tr data-id="<?= $row['idreserve'] ?>"> <!-- Attribut data-id pour identifier la réservation -->
                        <td><?= htmlspecialchars($row['nom_livre']) ?></td> <!-- Affiche le titre du livre -->
                        <td><?= htmlspecialchars($row['nom_auteur']) ?></td> <!-- Affiche le nom de l'auteur -->
                        <td><?= htmlspecialchars($row['j_debut']) ?></td> <!-- Affiche la date de réservation -->
                        <td><?= htmlspecialchars($row['j_fin']) ?></td> <!-- Affiche la date de fin de réservation -->
                        <td><button class="btnAnnuler" data-id="<?= $row['idreserve']; ?>">X</button></td> <!-- Bouton pour annuler la réservation -->
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Popup de confirmation de suppression de la réservation -->
    <div id="confirmationPopup" class="popup-overlay hidden">
        <div class="popup-box">
            <p>Voulez-vous vraiment supprimer cette réservation définitivement ?</p>
            <div class="popup-buttons">
                <button id="btnConfirm">Confirmer</button>
                <button id="btnCancel">Annuler</button>
            </div>
        </div>
    </div>

    <!-- Message affiché si l'utilisateur n'a pas de réservations -->
    <div id="noReservationMessage" class="hidden">
        <img src="../images/no-reservation.png" alt="Aucune réservation" style="display: block; margin: 0 auto; width: 100px; height: auto;">
        <p style="text-align: center; font-size: 18px; margin-top: 20px;">Vous n'avez aucune réservation en cours.</p>
    </div>
</main>

<?php include 'footer.php'; ?>
<script src="../JAVASCRIPT/Reservations.js"></script> <!-- Script pour gérer les interactions de la page -->
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
