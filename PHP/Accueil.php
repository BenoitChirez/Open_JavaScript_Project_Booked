
<?//Page de Présentation du site avec logo et les specifité de notre services?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/aboutus.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/Footer.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Header.css" />
    <link rel="icon" type="image/png" href="../images/logo_onglet.png" /> <!-- Icône de la page -->
    <script src="../JAVASCRIPT/acceuil.js"></script>
</head>
<body>
    <?php include 'header.php'; ?> <?//affichage du header?>
    <main>
        <div style="text-align: center; margin-top: 50px;">
            <img src="../images/logo.png" alt="logo" width="350" height="350"><?//Logo du site?>
        </div>
        <div style="display: flex; justify-content: center; gap: 20px; margin-top: 50px;">
            <div class="info-boxa scroll-effect"> <?// 3 box avec un effet d'apparition lors du scroll'?>
                <h2>Un Accès Illimité à la Connaissance</h2>
                <p>Que vous soyez passionné de romans, étudiant en quête de ressources ou curieux d’explorer de nouveaux horizons, notre bibliothèque vous offre un accès simple et rapide à des milliers d’ouvrages.</p>
            </div>
            <div class="info-boxa scroll-effect">
                <h2>Bienvenue dans Booked !</h2>
                <p>Découvrez une nouvelle façon d’accéder aux livres que vous aimez. Réservez facilement vos ouvrages préférés en ligne et récupérez-les sans attente.</p>
            </div>
            <div class="info-boxa scroll-effect">
                <h2>Simple et rapide</h2>
                <p>Avec Booked, trouvez le livre qu’il vous faut en quelques clics, réservez-le en ligne et passez le récupérer en bibliothèque quand ça vous arrange.</p>
            </div>
        </div>
    </main>
    
    <?php include 'footer.php'; ?><?// affichge footer?>
    
</body>
<div class="sparkle-container"></div><?// conteneur pour l'effet visuele en fond (etoiles qui apparaissent et disparaissent)'?>
</html>
