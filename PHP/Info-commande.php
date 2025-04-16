<?php
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

// Récupération de l'ID dans l'URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

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

        <header>
            <nav>
                <ul class="nav-list">
                    <div class="header1"><li><a href="aboutus.html">About us</a></li></div>
                    <div class="header2"><li><a href="Reservations.html">Vos réservations</a></li></div>
                    <div class="header3"><li><a href="Bibliotheque.html">Bibliotheque</a></li></div>
                    <div class="header4"><li><a href="Votre-profil.html">Votre profil</a></li></div>
                </ul>
            </nav>
        </header>

        <div id="exemplairesRestants"><?=$livre['nbr_restant']?></div>
        
        <main>
            <h1 id="titre" class="case"><?= htmlspecialchars($livre['nom_livre']) ?></h1>
            <div id="couverture" class="case"><img class="cover" src="<?= htmlspecialchars($livre['chemin_image']) ?>" alt="sonic"></div>
            <div id="auteuretc" class="case"><?= htmlspecialchars($livre['nom_auteur']) ?></div>
            <p id="description" class="case"><?= htmlspecialchars($livre['description']) ?></p>
            <div id="emprunt" class="case">Location pour 1 mois<br>A rendre le : </div>
            <div id="valider" class="case">Valider</div>
            <div id="restants" class="case">Restants : <?= htmlspecialchars($livre['nbr_restant']) ?>/<?= htmlspecialchars($livre['nbr_exemplaire']) ?></div>
        </main>

        <footer class="stylefooter">
            <div class="social">
                <a href="#" style="background-image: url('../images/Social/instagram-logo-noir-png.webp');"></a>
                <a href="#" style="background-image: url('../images/Social/X-noir.png');"></a>
            </div>
            <ul class="footer-links">
                <li><a href="Accueil.html">Accueil</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Conditions</a></li>
                <li><a href="#">Politique de confidentialité</a></li>
            </ul>
            <p class="copyright">© 2025 Booked. Tous droits réservés.</p>
        </footer>

        <script src="../JAVASCRIPT/Info-commande.js"></script>
    </body>
</html>