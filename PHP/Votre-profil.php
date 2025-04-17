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
        <title> Votre profil </title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../CSS/Acceuil.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/Footer.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/Header.css" />
    </head>
    <body>

        <?php include 'header.php'; ?>
        
        <main>
            <?php
            if (isset($_SESSION['id_utilisateur']) && isset($_SESSION['nom'])) {
                echo $_SESSION['id_utilisateur'];
                echo $_SESSION['nom'];
            }
            else {
                echo "<p> ajkzlqzla </p>";
            }
            ?>
        </main>

        <?php include 'footer.php'; ?>
    </body>
</html>