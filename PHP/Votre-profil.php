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
        <link rel="stylesheet" type="text/css" href="../CSS/Votre-profil.css" />
    
    </head>
    <body>

        <?php include 'header.php'; ?> 
        <?//inclusion du header ?>
        
        <main>
            <div class="profile-container"> <?// conteneur pour tous les element du main?>
                <h1>Bienvenue dans le profil</h1>
                <div class="profile-card"> <?// cette carte contient les information de l'utilisateur?>
                    <h2>
                        <?php 
                        if (isset($_SESSION['nom'])) {//affichage du nom du client si il existe
                            echo $_SESSION['nom'];
                            }
                            else {
                                echo "<p> no name </p>";
                            }
                                        ?>
                    </h2>
                    <p>
                        <?php 
                            if (isset($_SESSION['email'])) {//affichage du mail du client si il existe
                                echo $_SESSION['email'];
                                }
                                else {
                                    echo "<p> no email </p>";
                                }
                                            ?>
                    </p>
                    <div class="profile-id">
                        <?php 
                                if (isset($_SESSION['id_utilisateur'])) {//affichage du ID du client si il existe
                                    echo"ID:#";
                                    echo $_SESSION['id_utilisateur'];
                                    }
                                    else {
                                        echo "<p>no id </p>";
                                    }
                                                ?>

                    </div>
                </div>
                <form action="deconnexion.php" method="post" class="logout-form"><?//bouton pour deconnexion?>
                    <button type="submit" class="logout-button">Déconnexion</button>
                </form>
            </div>
        </main>

        <?php include 'footer.php'; // affichage du footer ?>
    </body>
</html>