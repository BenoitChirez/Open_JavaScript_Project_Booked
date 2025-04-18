<!-- page qui présente les différents livres de la librairie -->

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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/Acceuil.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Footer.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Header.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Bibliotheque.css" />
    <link rel="icon" type="image/png" href="../images/logo_onglet.png" /> <!-- Icône de la page -->
</head>
<body>

    <?php include 'header.php'; ?>

    <main>
        <section class="search-section">
            <input type="text" id="searchBar" placeholder="Rechercher un livre..." onkeyup="searchBooks()">
        </section>

        <section class="library">
            <?php
            $result = $conn->query("SELECT COUNT(*) AS total FROM livre"); // requête sql pour récupérer le nombre de livres dans la base de données
            $row = $result->fetch_assoc();
            $count = $row['total'];
            
            for ($i = 1; $i <= $count; $i++) { // chaque id de livre
                $query = "SELECT * FROM livre WHERE id_livre = $i"; // on récupère le livre associé à l'id
                $livre = $conn->query($query);
                $livre = $livre->fetch_assoc();
                // on affiche les informations du livre
                echo '<div class="book" data-title="' . htmlspecialchars($livre['nom_livre']) . '">';
                echo '<img src="' . htmlspecialchars($livre['chemin_image']) . '" alt="' . htmlspecialchars($livre['nom_livre']) . '">';
                echo '<h3>' . htmlspecialchars($livre['nom_livre']) . '</h3>';
                echo '<p>Auteur: ' . htmlspecialchars($livre['nom_auteur']) . '</p>';
                echo '<a class="lien" href="../PHP/Info-commande.php?id=' . ($i) . '">Voir plus</a>';
                echo '</div>';
            }
            ?>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <script>
        function searchBooks() {
            // fonctionnement de la barre de recherche
            let input = document.getElementById("searchBar").value.toLowerCase(); // récupère ce que l'utilisateur inscrit dans la barre de recherche
            let books = document.querySelectorAll(".book"); // récupérer tous les livres

            books.forEach(book => {
                let title = book.getAttribute("data-title").toLowerCase();
                book.style.display = title.includes(input) ? "block" : "none";
                // si le titre du livre inclut ce qui est écrit dans la barre de recherche on l'affiche avec display: block;
                // sinon on ne l'affiche pas
            });
        }
    </script>

</body>
</html>
