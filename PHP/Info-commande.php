<?php
session_start();
// Activer l'affichage des erreurs PHP pour la détection des problèmes
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";  // Nom d'utilisateur pour MAMP
$password = "root";  // Mot de passe pour MAMP, vide par défaut
$dbname = "projet_books";  // Remplace par le nom de ta base de données
$port = 8889;  // Port MySQL dans MAMP

// Créer la connexion avec le port spécifié
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupération de l'id du livre dans l'url, l'id est inséré dans l'url depuis la page bibliotheque.php
// les informations de la page seront piochés dans la base de données selon l'id du livre, ce qui évite de coder 20 pages pour 20 livres
$id = isset($_GET['id']) ? intval($_GET['id']) :

// Préparation de la requête
$stmt = $conn->prepare("SELECT * FROM livre WHERE id_livre = ?");
$stmt->bind_param("i", $id); // "i" = entier

// Exécution
$stmt->execute();

// Récupération des résultats
$result = $stmt->get_result();
$livre = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Commandes </title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../CSS/Footer.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/Header.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/Info-commande.css" />
    </head>
    <body>

        <?php include 'header.php'; ?>

        <!-- Balise invisible qui permet de récupérer le nombre d'exemplaires restants dans le javascript -->
        <div id="exemplairesRestants"><?= htmlspecialchars($livre['nbr_restant']); // fonction qui permet de conserver les caractères spéciaux ?></div>
        
        <main>
            <h1 id="titre" class="case"><?= htmlspecialchars($livre['nom_livre']) ?></h1>
            <p id="funfact">Placez votre curseur sur la couverture ! :D</p>
            <div id="couverture" class="case"><img class="cover" src="<?= htmlspecialchars($livre['chemin_image']) ?>" alt="sonic"></div>
            <div id="auteuretc" class="case"><?= htmlspecialchars($livre['nom_auteur']) ?></div>
            <p id="description" class="case"><?= htmlspecialchars($livre['description']) ?></p>
            <div id="emprunt" class="case">Location pour 1 mois<br>A rendre le :</div>
            <form id="valider" method="POST"> <!-- formulaire pour vérifier la validation de la réservation -->
                <input type="hidden" name="validerReservation" value="1">
                <button type="submit" id="bouton" class="case">Valider</button>
            </form>
            <div id="restants" class="case">Restants : <?= htmlspecialchars($livre['nbr_restant']) ?>/<?= htmlspecialchars($livre['nbr_exemplaire']) ?></div>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validerReservation'])) {
                // Tu peux récupérer l'id de l'utilisateur ici depuis la session
                $id_utilisateur = $_SESSION['id_utilisateur']; // Assure-toi que l'utilisateur est bien connecté
            
                $id_livre_reserve = $livre['id_livre'];
                $j_debut = date("Y-m-d"); // récupération de la date d'aujourd'hui sur le format année-mois-jour
                $j_fin = date("Y-m-d", strtotime("+1 month")); // ajout d'un mois à la date
            
                $insert = $conn->prepare("INSERT INTO reserve (id_livre, id_utilisateur, j_debut, j_fin) VALUES (?, ?, ?, ?)");
                $insert->bind_param("iiss", $id_livre_reserve, $id_utilisateur, $j_debut, $j_fin);
            
                if ($insert->execute()) {
                    $majNbrExemplaire = $conn->prepare("UPDATE livre SET nbr_restant = nbr_restant - 1 WHERE id_livre = ?");
                    $majNbrExemplaire->bind_param("i", $id);
                    $majNbrExemplaire->execute();
                    header("Location: ../PHP/Bibliotheque.php"); // renvoie vers la page Bibliotheque.php
                } else {
                    echo "<script>alert('Erreur lors de la réservation.');</script>";
                }
            
                $insert->close();
            }
            ?>
        </main>
        
        <?php include 'footer.php'; ?>

        <script src="../JAVASCRIPT/Info-commande.js"></script>
    </body>
</html>