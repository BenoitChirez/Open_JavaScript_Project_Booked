<?php
session_start();
// Activer l'affichage des erreurs PHP pour la détection des problèmes
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Vérifier si le formulaire est bien soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérifier si les champs sont présents
    if (isset($_POST['nom'], $_POST['email'], $_POST['motdepasse'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $motdepasse = $_POST['motdepasse'];

        // Sécuriser le mot de passe (hacher le mot de passe avant l'insertion)
        $motdepasse_hache = password_hash($motdepasse, PASSWORD_DEFAULT);

        // Connexion à la base de données
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

        // Préparer et lier la requête SQL pour insérer l'utilisateur
        $stmt = $conn->prepare("INSERT INTO utilisateur (nom, adresse_mail, mot_de_passe) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nom, $email, $motdepasse_hache);  // "sss" signifie que les 3 paramètres sont des chaînes de caractères

        // Exécuter la requête
        if ($stmt->execute()) {
            $id_utilisateur = $stmt->insert_id;

            // Démarrer la session et stocker les infos
            $_SESSION['id_utilisateur'] = $id_utilisateur;
            $_SESSION['nom'] = $nom;

            // Si l'inscription a réussi, rediriger vers la page du profil
            header("Location: ../PHP/Votre-profil.php");  // Page de succès
            exit;  // Toujours appeler exit après une redirection
        } else {
            // Si l'insertion échoue, afficher un message d'erreur
            echo "Erreur lors de l'inscription : " . $stmt->error;
        }

        // Fermer la connexion et la préparation de la requête
        $stmt->close();
        $conn->close();

    } else {
        // Si des champs sont manquants, afficher un message d'erreur
        echo "Des champs sont manquants dans le formulaire.";
    }
} else {
    // Si la méthode n'est pas POST, afficher ce message
    echo "Aucune donnée reçue (pas de méthode POST).";
}
?>
