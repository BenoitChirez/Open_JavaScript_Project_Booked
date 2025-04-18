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

// récupération des éléments de la page php
var exemplairesRestants = document.getElementById("exemplairesRestants");
var valider = document.getElementById("valider");
var emprunt = document.getElementById("emprunt");
var restants = document.getElementById("restants");

valider.addEventListener("mouseenter", function() {
    valider.style.cursor = "pointer"; // quand la souris survole l'élément, la souris devient un pointeur
});

if (exemplairesRestants.innerHTML == 0) {
    // si il n'y a plus d'exemplaires disponibles,
    // on supprime le bouton le nombre d'exemplaires restants et la date de rendu du livre
    // et on affiche qu'aucun exemplaire est disponible
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

    // crée un objet Audio
    const spinSound = new Audio('../AUDIO/sliding_rock.mp3');
    spinSound.loop = true; // le son tourne en boucle pendant l'animation

    function rotate() {
        angle += 0.85; // vitesse de rotation
        img.style.transform = `rotateY(${angle}deg)`; // rotation autour de l'axe vertical
        animationFrame = requestAnimationFrame(rotate); // le navigateur éxécute rotate() à chaque raffraîchissement de l'écran
                                                        // généralement 60 fois par secondes
    }

    img.addEventListener('mouseenter', () => { // lorsqu'on place le curseur sur l'image
        if (!rotating) {
            rotating = true;
            img.style.transition = 'none'; // désactive la transition pendant la rotation
            rotate();

            // Lance le son
            spinSound.currentTime = 0; // recommence le son au début
            spinSound.play();
        }
    });

    img.addEventListener('mouseleave', () => { // lorsqu'on enlève le curseur de l'image
        rotating = false;
        cancelAnimationFrame(animationFrame); // on stoppé l'animation

        // active la transition pour revenir à la position initiale
        img.style.transition = 'transform 1.2s ease';
        img.style.transform = `rotateY(0deg)`;

        // reset de l'angle pour la prochaine fois
        angle = 0;

        // stoppe le son
        spinSound.pause();
        spinSound.currentTime = 0;
    });
});