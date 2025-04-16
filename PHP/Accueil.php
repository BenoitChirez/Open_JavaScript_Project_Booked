<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/aboutus.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Footer.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Header.css" />
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div style="text-align: center; margin-top: 50px;">
            <img src="../images/logo.png" alt="logo" width="350" height="350">
        </div>
        <div style="display: flex; justify-content: center; gap: 20px; margin-top: 50px;">
            <div class="info-box scroll-effect">
                <h2>Un Accès Illimité à la Connaissance</h2>
                <p>Que vous soyez passionné de romans, étudiant en quête de ressources ou curieux d’explorer de nouveaux horizons, notre bibliothèque vous offre un accès simple et rapide à des milliers d’ouvrages.</p>
            </div>
            <div class="info-box scroll-effect">
                <h2>Bienvenue dans Booked !</h2>
                <p>Découvrez une nouvelle façon d’accéder aux livres que vous aimez. Réservez facilement vos ouvrages préférés en ligne et récupérez-les sans attente.</p>
            </div>
            <div class="info-box scroll-effect">
                <h2>Simple et rapide</h2>
                <p>Avec Booked, trouvez le livre qu’il vous faut en quelques clics, réservez-le en ligne et passez le récupérer en bibliothèque quand ça vous arrange.</p>
            </div>
        </div>
    </main>
    
    <?php include 'footer.php'; ?>
    <script>
        let hasScrolled = false;

        function showScrollEffects() {
            document.querySelectorAll(".scroll-effect").forEach(el => {
                if (el.getBoundingClientRect().top < window.innerHeight - 100) {
                    el.classList.add("visible");
                }
            });
        }

        document.addEventListener("scroll", function () {
            hasScrolled = true;
            
            showScrollEffects();
        });

        setTimeout(() => {
            if (!hasScrolled) {
                showScrollEffects();
            }
        }, 5000);

        document.addEventListener("DOMContentLoaded", function () {
            const sparkleContainer = document.querySelector(".sparkle-container");

            for (let i = 0; i < 80; i++) {
                const sparkle = document.createElement("div");
                sparkle.classList.add("sparkle");

                const x = Math.random() * window.innerWidth;
                const y = Math.random() * window.innerHeight;
                const delay = Math.random() * 5;
                const duration = 2 + Math.random() * 3;

                sparkle.style.left = `${x}px`;
                sparkle.style.top = `${y}px`;
                sparkle.style.animationDelay = `${delay}s`;
                sparkle.style.animationDuration = `${duration}s`;

                sparkleContainer.appendChild(sparkle);
            }
        });
    </script>
</body>
<div class="sparkle-container"></div>
</html>
