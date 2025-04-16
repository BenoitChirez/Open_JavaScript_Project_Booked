// date d'aujourd'hui
var aujourdhui = new Date();

// incrémentation de la date d'un mois
var aujourdhuiPlusUnMois = new Date(aujourdhui);
aujourdhuiPlusUnMois.setMonth(aujourdhuiPlusUnMois.getMonth() + 1);

// écrire l'information dans la balise d'id emprunt
var emprunt = document.getElementById("emprunt");
emprunt.innerHTML = "A rendre : " + aujourdhuiPlusUnMois.toLocaleDateString("fr-FR");


/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////


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
    valider.innerHTML = "Aucun exemplaire disponible";
    valider.onclick = function() {
        alert("Aucun exemplaire disponible");
    }
}