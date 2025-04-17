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

    <style>
        body {
          font-family: Arial, sans-serif;
          background-color: #f5e6d7; 
          color: #4e342e; 
          margin: 0;
          min-height: 100vh;
          display: flex;
          flex-direction: column;
        }
        main {
          flex: 1;
          display: flex;
          justify-content: center;
          align-items: center;
        }


        .profile-card {
          background-color: #d7b899;
          color: #4e342e;
          padding: 30px;
          border-radius: 25px;
          box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
          width: 300px;
          text-align: center;
          font-family: 'Poppins', sans-serif;
          transition: transform 0.3s ease-in-out;
        }

        .profile-card:hover {
          transform: scale(1.05);
        }

        .profile-card h2 {
          margin-bottom: 10px;
          font-weight: 600;
        }

        .profile-card p {
          margin: 5px 0;
          font-size: 14px;
        }

        .profile-id {
          font-size: 0.8em;
          color: #4e342e;
          margin-top: 10px;
          opacity: 0.7;
        }
        .logout-form {
          margin-top: 20px;
          text-align: center;
        }

        .logout-button {
          background-color: #c0392b; /* rouge profond */
          color: white;
          border: none;
          padding: 10px 20px;
          font-family: 'Poppins', sans-serif;
          font-weight: 600;
          font-size: 14px;
          border-radius: 8px;
          cursor: pointer;
          transition: background-color 0.3s ease;
          box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .logout-button:hover {
          background-color: #e74c3c;
        }
        .profile-container {
          display: flex;
          flex-direction: column;
          align-items: center;
        }


  </style>
    </head>
    <body>

        <?php include 'header.php'; ?>
        
        <main>
            <div class="profile-container">
                <div class="profile-card">
                    <h2>
                        <?php 
                        if (isset($_SESSION['nom'])) {
                            echo $_SESSION['nom'];
                            }
                            else {
                                echo "<p> no name </p>";
                            }
                                        ?>
                    </h2>
                    <p>
                        <?php 
                            if (isset($_SESSION['email'])) {
                                echo $_SESSION['email'];
                                }
                                else {
                                    echo "<p> no email </p>";
                                }
                                            ?>
                    </p>
                    <div class="profile-id">
                        <?php 
                                if (isset($_SESSION['id_utilisateur'])) {
                                    echo"ID:#";
                                    echo $_SESSION['id_utilisateur'];
                                    }
                                    else {
                                        echo "<p>no id </p>";
                                    }
                                                ?>

                    </div>
                </div>
                <form action="deconnexion.php" method="post" class="logout-form">
                    <button type="submit" class="logout-button">Déconnexion</button>
                </form>
            </div>
        </main>

        <?php include 'footer.php'; ?>
    </body>
</html>