/*
    Cette page contient le code JavaScript pour gérer les réservations.
    Elle inclut des fonctionnalités telles que l'annulation de réservations, le tri des colonnes d'un tableau et la gestion de l'affichage d'un message lorsque le tableau est vide.
    Elle gère également la mise en couleur des lignes du tableau en fonction de la date de fin de réservation.
*/

/**
 * Fonction qui permettra de trier une table HTML
 * 
 * @param {HTMLTableElement} table La table à trier
 * @param {Number} colonne L'indice de la colonne à trier
 * @param {Boolean} asc Va déterminer si le tri sera dans l'ordre croissant ou décroissant
 */
function TrieTableauParColonne(table, colonne, asc = true) {
    const tableBody = table.tBodies[0]; // Séléctionne la partie <tbody></tbody> de notre tableau.
    const tableRows = Array.from(tableBody.querySelectorAll("tr")); // Séléctionne toutes les lignes du tableau et les mets dans un tableau.
    const dirModif = asc ? 1 : -1;

    if (colonne === table.rows[0].cells.length - 1) return;

    const trieRows = tableRows.sort((a, b) => { // On va trier les lignes du tableau en fonction de la colonne choisie.
        const colAValue = a.querySelector(`td:nth-child(${colonne + 1})`).textContent.trim();
        const colBValue = b.querySelector(`td:nth-child(${colonne + 1})`).textContent.trim();
        return colAValue > colBValue ? (1 * dirModif) : (-1 * dirModif);
    });

    while (tableBody.firstChild) { // On va supprimer toutes les lignes du tableau avant d'ajouter les nouvelles lignes triées.
        tableBody.removeChild(tableBody.firstChild);
    }

    trieRows.forEach(row => { // On va faire une animation de la ligne qui est ajoutée
        row.classList.remove("animated-row");
        void row.offsetWidth;
        row.classList.add("animated-row");
        tableBody.appendChild(row);
    });

    // On va enregistrer comment les colonnes sont déjà triées
    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));  // fait en sorte que lorsque on clique sur un autre th, on supprime le th-sort-asc/desc existant, cela en fait donc un a la fois.
    table.querySelector(`th:nth-child(${colonne + 1})`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${colonne + 1})`).classList.toggle("th-sort-desc", !asc);
}

// Gestion du tri
document.querySelectorAll(".table_reservation th").forEach(headerCell => { // On va séléctionner tous les th de la table
    headerCell.addEventListener("click", () => {
        const tableElement = headerCell.closest("table"); // On va séléctionner la table dans laquelle se trouve le th sur lequel on a cliqué
        const headerIndice = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell); // On va séléctionner l'indice du th sur lequel on a cliqué
        const estAsc = headerCell.classList.contains("th-sort-asc"); // On va séléctionner si le th est trié dans l'ordre croissant ou décroissant

        TrieTableauParColonne(tableElement, headerIndice, !estAsc); // On va trier la table en fonction de l'indice du th sur lequel on a cliqué et de l'ordre dans lequel il est trié.
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const btnAnnuler = document.querySelectorAll(".btnAnnuler"); // Séléctionne le bouton d'annulation
    const confirmationPopup = document.getElementById("confirmationPopup"); // Séléctionne le popup de confirmation
    const btnConfirm = document.getElementById("btnConfirm"); // Séléctionne le bouton de confirmation
    const btnCancel = document.getElementById("btnCancel"); // Séléctionne le bouton d'annulation de la popup
    let reservationIdToDelete = null;

    // Ouvrir la popup et stocker l'ID de la réservation
    btnAnnuler.forEach(function (button) {
        button.addEventListener("click", function () {
            // Récupérer l'ID de la réservation associée au bouton
            reservationIdToDelete = button.getAttribute("data-id");

            // Ajouter la classe avec l'ID au bouton de confirmation
            btnConfirm.classList.add("confirm-" + reservationIdToDelete);

            // Afficher la popup
            confirmationPopup.classList.remove("hidden");
        });
    });

    // Annuler l'annulation
    btnCancel.addEventListener("click", function () {
        confirmationPopup.classList.add("hidden");
    });

    // Confirmer l'annulation et effectuer l'action (par exemple, supprimer la réservation)
    btnConfirm.addEventListener("click", function () {
        if (reservationIdToDelete) {
            // Exemple simple de suppression via redirection :
            window.location.href = "suppression_reservation.php?id=" + reservationIdToDelete;

            // Cacher la popup
            confirmationPopup.classList.add("hidden");

            // Afficher un message de confirmation
            document.getElementById("confirmation_message").classList.remove("hidden");
        }
    });
});


/**
 * Fonction qui vérifie si le tableau est vide et affiche un message si besoin
 */
function verifierTableVide() {
    const table = document.querySelector(".table_reservation");
    const tbody = table.querySelector("tbody");
    const message = document.getElementById("noReservationMessage");

    if (tbody.children.length === 0) { // Si le tableau n'a pas de lignes
        // On affiche le message et on cache le tableau
        table.style.display = "none";
        if (message) message.style.display = "block"; // On affiche le message
    } else { // Sinon, on cache le message et on affiche le tableau
        table.style.display = "table";
        if (message) message.style.display = "none"; // On cache le message
    }
}

window.addEventListener("DOMContentLoaded", () => {
    verifierTableVide();
});

// Permet de mettre en couleur en fonction de la date de fin
// Rouge : date de fin est passée
// Orange : date de fin dans 3 jours ou moins
document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll(".table_reservation tbody tr");

    rows.forEach(row => {
        const endDateStr = row.cells[3].textContent.trim(); // colonne "Date de fin"
        const endDate = new Date(endDateStr); // format aaaa/mm/jj
        const today = new Date();

        // Réinitialiser l'heure pour une comparaison juste
        today.setHours(0, 0, 0, 0);
        endDate.setHours(0, 0, 0, 0);

        const diffTime = endDate - today;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        if (diffDays < 0) {
            row.style.backgroundColor = "#ffcccc"; // rouge : déjà expiré
        } else if (diffDays <= 3) {
            row.style.backgroundColor = "#ffe5b4"; // orange : 3 jours ou moins restants
        } 
        /*else {  // Si on veut mettre en vert les réservations qui sont avec plus de 3 jours avant la date de fin
            row.style.backgroundColor = "#ccffcc"; // vert : plus de 3 jours
        } */
    });
});