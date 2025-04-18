////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////// Affichage de la date de rendu du livre ////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////

// date d'aujourd'hui
var aujourdhui = new Date();

// incrémentation de la date d'un mois
var aujourdhuiPlusUnMois = new Date(aujourdhui);
aujourdhuiPlusUnMois.setMonth(aujourdhuiPlusUnMois.getMonth() + 1);

// écrire l'information dans la balise d'id emprunt
var emprunt = document.getElementById("emprunt");
emprunt.innerHTML = "A rendre : " + aujourdhuiPlusUnMois.toLocaleDateString("fr-FR");



////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////// Vérification d'exemplaires restants de livre /////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////

var exemplairesRestants = document.getElementById("exemplairesRestants");
var valider = document.getElementById("valider");
var emprunt = document.getElementById("emprunt");
var restants = document.getElementById("restants");

valider.addEventListener("mouseenter", function() {
    valider.style.cursor = "pointer"; // quand la souris survole l'élément, la souris devient un pointeur
});

if (exemplairesRestants.innerHTML == 0) { // si il n'y a plus d'exemplaires disponibles
    emprunt.style.display = "none";
    restants.style.display = "none";
    valider.style.fontSize = "1.5vw";
    valider.style.margin = "0";
    valider.style.textAlign = "center";
    valider.innerHTML = "Aucun exemplaire disponible";
}



////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////// Animation sur la couverture du livre /////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////

document.addEventListener('DOMContentLoaded', function () {
    const img = document.querySelector('#couverture img');
    let animationFrame;
    let angle = 0;
    let rotating = false;

    // Crée un objet Audio
    const spinSound = new Audio('../AUDIO/sliding_rock.mp3');
    spinSound.loop = true; // Le son tourne en boucle pendant l'animation

    function rotate() {
        angle += 0.85;
        img.style.transform = `rotateY(${angle}deg)`;
        animationFrame = requestAnimationFrame(rotate);
    }

    img.addEventListener('mouseenter', () => {
        if (!rotating) {
            rotating = true;
            img.style.transition = 'none'; // désactive la transition pendant la rotation
            rotate();

            // Lance le son
            spinSound.currentTime = 0; // recommence au début
            spinSound.play();
        }
    });

    img.addEventListener('mouseleave', () => {
        rotating = false;
        cancelAnimationFrame(animationFrame);

        // Active la transition pour revenir à la position initiale
        img.style.transition = 'transform 1.2s ease';
        img.style.transform = `rotateY(0deg)`;

        // Reset de l'angle pour la prochaine fois
        angle = 0;

        // Stoppe le son
        spinSound.pause();
        spinSound.currentTime = 0;
    });
});