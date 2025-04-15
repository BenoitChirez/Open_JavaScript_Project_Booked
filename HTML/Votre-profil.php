<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/Acceuil.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Footer.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Header.css" />
</head>
<body>

<header>
    <nav>
        <ul class="nav-list">
            <div class="header1"><li><a href="aboutus.html">About us</a></li></div>
            <div class="header2"><li><a href="Reservations.html">Vos réservations</a></li></div>
            <div class="header3"><li><a href="Bibliotheque.html">Bibliotheque</a></li></div>
            <div class="header4"><li><a href="Votre-profil.php">Votre profil</a></li></div>
        </ul>
    </nav>
</header>

<main>
    <div class="profil-container">
        <h2>Bienvenue, <?php echo htmlspecialchars($nom); ?> !</h2>
        <p><strong>Email :</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><a href="deconnexion.php">Se déconnecter</a></p>
    </div>
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

</body>
</html>
