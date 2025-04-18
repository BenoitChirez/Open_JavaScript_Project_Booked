
<?// Cette page Présente qui nous sommes et notre objectif dans ce projet, et pourquoi ce choix?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> About us </title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/aboutus.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Footer.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/Header.css" />
    <link rel="icon" type="image/png" href="../images/logo_onglet.png" /> <!-- Icône de la page -->
    
</head>
<body>

    <?php include 'header.php'; ?><?//affichage header?>

    <main>
        <div style="text-align: center; margin-top: 50px;"><?// box pour le logo?>
            <img src="../images/logo.png" alt="logo" width="350" height="350">
        </div>
        <div class="info-box" style="display: flex; flex-direction: column; align-items: center; gap: 20px; margin-top: 50px;"><?// Box pour contenir les info?>
            <div class="photo-row" style="display: flex; justify-content: center; gap: 15px;">
                <img src="../images/image_adam.jpg" alt="1" style="width: 100px; height: 100px; border-radius: 50%;">
                <img src="../images/image_benoit.png" alt="2" style="width: 100px; height: 100px; border-radius: 50%;">
                <img src="../images/image_max.jpg" alt="3" style="width: 100px; height: 100px; border-radius: 50%;">
                <img src="../images/image_sam.jpg" alt="4" style="width: 100px; height: 100px; border-radius: 50%;">
                <img src="../images/image_shalom.png" alt="5" style="width: 100px; height: 100px; border-radius: 50%;">
            </div>
            <?//les photos de chacun des membres (avec leurs nom pour leurs identification)?>
            <div style="max-width: 800px; text-align: center; font-size: 18px;">
                <b> <?// Texte?>
                    <p>Nous sommes un groupe de cinq étudiants en école d’ingénieurs, passionnés par la technologie, l’innovation… et surtout par l’idée de créer quelque chose de concret et d’utile.</p>
                    <p>
                        Dans le cadre de notre projet de développement web, nous avons décidé de sortir des sentiers battus : au lieu de simplement "faire un site", nous avons voulu concevoir une application qui répond à un besoin réel.
                    </p>
                    <p>
                        Notre objectif ? Mettre en pratique nos compétences en développement tout en construisant un outil qui a du sens
                    </p>
                </b>
            </div>
        </div>
        <div id="tooltip" style="
          position: fixed;
          bottom: 20px;
          right: 20px;
          background-color: #333;
          color: #fff;
          padding: 10px 15px;
          border-radius: 8px;
          font-size: 14px;
          display: none;
          box-shadow: 0 4px 8px rgba(0,0,0,0.2);
          z-index: 1000;">
         </div><?// box pour afficher du texte lorsque passage sur image avec souris?>



    </main>
    <?php include 'footer.php'; ?>
    <script src="../JAVASCRIPT/aboutus.js">
    </script>
</body>
</html>


