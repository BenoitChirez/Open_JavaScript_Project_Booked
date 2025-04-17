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
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_utilisateur);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Vos réservations </title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/Reservation.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Footer.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Header.css" />
</head>
<body>
<?php include 'header.php'; ?>

<main>
    <h2 id="titreReservations">Mes Réservations</h2>

    <table class="table table_reservation">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date réservation</th>
                <th>Fin de la réservation</th>
                <th>Annuler la réservation</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr data-id="<?= $row['idreserve'] ?>">
                        <td><?= htmlspecialchars($row['nom_livre']) ?></td>
                        <td><?= htmlspecialchars($row['nom_auteur']) ?></td>
                        <td><?= htmlspecialchars($row['j_debut']) ?></td>
                        <td><?= htmlspecialchars($row['j_fin']) ?></td>
                        <td><button class="btnAnnuler" data-id="<?= $row['idreserve']; ?>">X</button></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div id="confirmationPopup" class="popup-overlay hidden">
        <div class="popup-box">
            <p>Voulez-vous vraiment supprimer cette réservation définitivement ?</p>
            <div class="popup-buttons">
                <button id="btnConfirm">Confirmer</button>
                <button id="btnCancel">Annuler</button>
            </div>
        </div>
    </div>

    <div id="noReservationMessage" class="hidden">
        <img src="../images/no-reservation.png" alt="Aucune réservation" style="display: block; margin: 0 auto; width: 100px; height: auto;">
        <p style="text-align: center; font-size: 18px; margin-top: 20px;">Vous n'avez aucune réservation en cours.</p>
    </div>

    <div id="confirmation_message" class="confirmation_message">
        Réservation annulée avec succès.
    </div>
</main>

<?php include 'footer.php'; ?>
<script src="../JAVASCRIPT/Reservations.js"></script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
