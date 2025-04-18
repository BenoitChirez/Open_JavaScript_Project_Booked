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
            $result = $conn->query("SELECT COUNT(*) AS total FROM livre");
            $row = $result->fetch_assoc();
            $count = $row['total']; // ← c'est ici qu'on récupère la valeur
            
            for ($i = 1; $i <= $count; $i++) {
                $query = "SELECT * FROM livre WHERE id_livre = $i";
                $livre = $conn->query($query);
                $livre = $livre->fetch_assoc();
                echo '<div class="book" data-title="' . htmlspecialchars($livre['nom_livre']) . '">';
                echo '<img src="' . htmlspecialchars($livre['chemin_image']) . '" alt="' . htmlspecialchars($livre['nom_livre']) . '">';
                echo '<h3>' . htmlspecialchars($livre['nom_livre']) . '</h3>';
                echo '<p>Auteur: ' . htmlspecialchars($livre['nom_auteur']) . '</p>';
                echo '<a class="lien" href="../PHP/Info-commande.php?id=' . ($i) . '">Voir plus</a>';
                echo '</div>';
            }
            ?>
        <!--
            <div class="book" data-title="Le Comte de Monte-Cristo">
                <img src="../images/livres/monte-cristo.jpg" alt="Le Comte de Monte-Cristo">
                <h3>Le Comte de Monte-Cristo</h3>
                <p>Auteur: Alexandre Dumas</p>
                <p class="description">Un roman d'aventure et de vengeance captivant.</p>
                <a href="../PHP/Info-commande.php?id=1">Voir plus</a>
            </div>

            <div class="book" data-title="Les Misérables">
                <img src="../images/livres/miserables.jpg" alt="Les Misérables">
                <h3>Les Misérables</h3>
                <p>Auteur: Victor Hugo</p>
                <p class="description">Un chef-d'œuvre sur la rédemption et l'injustice sociale.</p>
                <a href="../PHP/Info-commande.php?id=2">Voir plus</a>
            </div>

            <div class="book" data-title="Madame Bovary">
                <img src="../images/livres/madame-bovary.jpg" alt="Madame Bovary">
                <h3>Madame Bovary</h3>
                <p>Auteur: Gustave Flaubert</p>
                <p class="description">Une critique du romantisme et des illusions de la bourgeoisie.</p>
                <a href="../PHP/Info-commande.php?id=3">Voir plus</a>
            </div>

            <div class="book" data-title="Le Rouge et le Noir">
                <img src="../images/livres/rouge-noir.jpg" alt="Le Rouge et le Noir">
                <h3>Le Rouge et le Noir</h3>
                <p>Auteur: Stendhal</p>
                <p class="description">Un roman d'ambition et d'ascension sociale.</p>
                <a href="../PHP/Info-commande.php?id=4">Voir plus</a>
            </div>

            <div class="book" data-title="Germinal">
                <img src="../images/livres/germinal.jpg" alt="Germinal">
                <h3>Germinal</h3>
                <p>Auteur: Émile Zola</p>
                <p class="description">Un roman social puissant sur les conditions des mineurs.</p>
                <a href="../PHP/Info-commande.php?id=5">Voir plus</a>
            </div>

            <div class="book" data-title="Notre-Dame de Paris">
                <img src="../images/livres/notre-dame.jpg" alt="Notre-Dame de Paris">
                <h3>Notre-Dame de Paris</h3>
                <p>Auteur: Victor Hugo</p>
                <p class="description">Un récit historique autour de la cathédrale et de Quasimodo.</p>
                <a href="../PHP/Info-commande.php?id=6">Voir plus</a>
            </div>

            <div class="book" data-title="À la recherche du temps perdu">
                <img src="../images/livres/proust.jpg" alt="À la recherche du temps perdu">
                <h3>À la recherche du temps perdu</h3>
                <p>Auteur: Marcel Proust</p>
                <p class="description">Une œuvre monumentale sur la mémoire et le temps.</p>
                <a href="../PHP/Info-commande.php?id=7">Voir plus</a>
            </div>

            <div class="book" data-title="L'Étranger">
                <img src="../images/livres/etranger.jpg" alt="L'Étranger">
                <h3>L'Étranger</h3>
                <p>Auteur: Albert Camus</p>
                <p class="description">Un roman existentiel sur l'absurde et l'indifférence.</p>
                <a href="../PHP/Info-commande.php?id=8">Voir plus</a>
            </div>

            <div class="book" data-title="1984">
                <img src="../images/livres/1984.jpg" alt="1984">
                <h3>1984</h3>
                <p>Auteur: George Orwell</p>
                <p class="description">Une dystopie sur la surveillance et le totalitarisme.</p>
                <a href="../PHP/Info-commande.php?id=9">Voir plus</a>
            </div>

            <div class="book" data-title="Crime et Châtiment">
                <img src="../images/livres/crime-chatiment.jpg" alt="Crime et Châtiment">
                <h3>Crime et Châtiment</h3>
                <p>Auteur: Fiodor Dostoïevski</p>
                <p class="description">Un roman psychologique sur la culpabilité et la rédemption.</p>
                <a href="../PHP/Info-commande.php?id=10">Voir plus</a>
            </div>

            <div class="book" data-title="Gatsby le Magnifique">
                <img src="../images/livres/gatsby.jpg" alt="Gatsby le Magnifique">
                <h3>Gatsby le Magnifique</h3>
                <p>Auteur: F. Scott Fitzgerald</p>
                <p class="description">Une critique du rêve américain dans les années 1920.</p>
                <a href="../PHP/Info-commande.php?id=11">Voir plus</a>
            </div>

            <div class="book" data-title="Orgueil et Préjugés">
                <img src="../images/livres/orgueil.jpg" alt="Orgueil et Préjugés">
                <h3>Orgueil et Préjugés</h3>
                <p>Auteur: Jane Austen</p>
                <p class="description">Un roman sur les conventions sociales et l’amour.</p>
                <a href="../PHP/Info-commande.php?id=12">Voir plus</a>
            </div>

            <div class="book" data-title="Le Petit Prince">
                <img src="../images/livres/petit-prince.jpg" alt="Le Petit Prince">
                <h3>Le Petit Prince</h3>
                <p>Auteur: Antoine de Saint-Exupéry</p>
                <p class="description">Une histoire poétique sur l’amitié et l’imagination.</p>
                <a href="../PHP/Info-commande.php?id=13">Voir plus</a>
            </div>
        -->
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <script>
        function searchBooks() {
            let input = document.getElementById("searchBar").value.toLowerCase();
            let books = document.querySelectorAll(".book");

            books.forEach(book => {
                let title = book.getAttribute("data-title").toLowerCase();
                book.style.display = title.includes(input) ? "block" : "none";
            });
        }
    </script>

</body>
</html>
