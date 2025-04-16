<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Vos réservations </title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../CSS/Reservation.css " />
        <link rel="stylesheet" type="text/css" href="../CSS/Footer.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/Header.css" />
    </head>
    <body>
        <?php include 'header.php'; ?>
        
        <main>


            <!-- Faire une page de reservation dans un tableau -->
            <h2 id="titreReservations">Mes Réservations</h2>

            <table class=" table table_reservation">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Date réservation</th>
                        <th>Fin de la réservation</th>
                        <th>Annuler la réservation</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Remplissage automatique avec la base de donnée -->
                    <tr>
                        <td>Le seigneur des Anneaux</td>
                        <td>J. R. R. Tolkien</td>
                        <td>2025/03/16</td>
                        <td>2025/04/16</td>
                        <td><button class="btnAnnuler" onclick="showConfirmationPopup()">X</button></td>
                    </tr>
                    <tr>
                        <td>Harry potter</td>
                        <td>J. K. Rowling</td>
                        <td>2022/01/01</td>
                        <td>2022/02/01</td>
                        <td><button class="btnAnnuler" onclick="showConfirmationPopup()">X</button></td>
                    </tr>
                    <tr>
                        <td>MAMAMA</td>
                        <td>ZIZJZA</td>
                        <td>2030/01/01</td>
                        <td>2030/02/01</td>
                        <td><button class="btnAnnuler" onclick="showConfirmationPopup()">X</button></td>
                    </tr>
                    <tr>
                        <td>Balerina capuccina</td>
                        <td>MIMIMI</td>
                        <td>2025/09/01</td>
                        <td>2025/10/01</td>
                        <td><button class="btnAnnuler" onclick="showConfirmationPopup()">X</button></td>
                    </tr>
                </tbody>
            </table>
            <!-- Boîte de confirmation personnalisée -->
            <div id="confirmationPopup" class="popup-overlay hidden">
                <div class="popup-box">
                    <p>Voulez-vous vraiment supprimer cette réservation défnitivement ?</p>
                    <div class="popup-buttons">
                        <button id="btnConfirm">Confirmer</button>
                        <button id="btnCancel">Annuler</button>
                    </div>
                </div>
            </div>

            <div id="noReservationMessage" class="hidden"> <!-- Centrer l'image -->
                <img src="../images/no-reservation.png" alt="Aucune réservation" style="display: block; margin: 0 auto; width: 100px; height: auto;">
                <p style="text-align: center; font-size: 18px; margin-top: 20px;">Vous n'avez aucune réservation en cours.</p>
            </div> 

            <div id="confirmation_message" class="confirmation_message">
                Réservation annulée avec succès.
            </div>

        </main>

        <?php include 'footer.php'; ?>
        <script src="../JAVASCRIPT/Reservations.js"> </script>
    </body>
</html>