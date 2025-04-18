<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Vérifier si le formulaire est bien soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    if (isset($_POST['nom'], $_POST['email'], $_POST['motdepasse'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $motdepasse = $_POST['motdepasse'];

        // Sécuriser le mot de passe 
        $motdepasse_hache = password_hash($motdepasse, PASSWORD_DEFAULT);

        // Connexion à la bdd
        $servername = "localhost";
        $username = "root";  
        $password = "root";  
        $dbname = "projet_books";  
        $port = 8889;  

        // Créer la connexion 
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion a échoué: " . $conn->connect_error);
        }

        // Préparation de la requête SQL 
        $stmt = $conn->prepare("INSERT INTO utilisateur (nom, adresse_mail, mot_de_passe) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nom, $email, $motdepasse_hache);  

        // Exécuter la requête
        if ($stmt->execute()) {
            $id_utilisateur = $stmt->insert_id;

            // Démarrage de la session
            $_SESSION['id_utilisateur'] = $id_utilisateur;
            $_SESSION['nom'] = $nom;

            
            header("Location: ../PHP/Votre-profil.php"); 
            exit;  
        } else {
            // Si l'insertion échoue, afficher un message d'erreur
            echo "Erreur lors de l'inscription : " . $stmt->error;
        }

        
        $stmt->close();
        $conn->close();

    } else {
        // Si des champs sont manquants, afficher un message d'erreur
        echo "Des champs sont manquants dans le formulaire.";
    }
} else {
   
    echo "Aucune donnée reçue (pas de méthode POST).";
}
?>