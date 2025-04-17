<?php
// Affichage des erreurs pour debug
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email_connexion'], $_POST['motdepasse_connexion'])) {
        $email = $_POST['email_connexion'];
        $motdepasse = $_POST['motdepasse_connexion'];

        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "projet_books";
        $port = 8889;

        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        if ($conn->connect_error) {
            die("Connexion échouée : " . $conn->connect_error);
        }

        // Rechercher l'utilisateur par email
        $stmt = $conn->prepare("SELECT id_utilisateur, nom, mot_de_passe FROM utilisateur WHERE adresse_mail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $utilisateur = $result->fetch_assoc();

            // Vérification du mot de passe
            if (password_verify($motdepasse, $utilisateur['mot_de_passe'])) {
                $_SESSION['id_utilisateur'] = $utilisateur['id_utilisateur'];
                $_SESSION['nom'] = $utilisateur['nom'];

                header("Location: ../PHP/Votre-profil.php");
                exit;
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Adresse mail non trouvée.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>