<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Connexion à la base de données MySQL
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "projet_books"; // <-- remplace si besoin

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

?>