/**
 * Fonction qui permettra de trier une table HTML
 * 
 * @param {HTMLTableElement} table La table à trier
 * @param {Number} colonne L'indice de la colonne à trier
 * @param {Boolean} asc Va déterminer si le tri sera dans l'ordre croissant ou décroissant
 */
function TrieTableauParColonne(table, colonne, asc = true) {
    const tableBody = table.tBodies[0];
    const tableRows = Array.from(tableBody.querySelectorAll("tr"));
    const dirModif = asc ? 1 : -1;

    if (colonne === table.rows[0].cells.length - 1) return;

    const trieRows = tableRows.sort((a, b) => {
        const colAValue = a.querySelector(`td:nth-child(${colonne + 1})`).textContent.trim();
        const colBValue = b.querySelector(`td:nth-child(${colonne + 1})`).textContent.trim();
        return colAValue > colBValue ? (1 * dirModif) : (-1 * dirModif);
    });

    while (tableBody.firstChild) {
        tableBody.removeChild(tableBody.firstChild);
    }

    trieRows.forEach(row => {
        row.classList.remove("animated-row");
        void row.offsetWidth;
        row.classList.add("animated-row");
        tableBody.appendChild(row);
    });

    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
    table.querySelector(`th:nth-child(${colonne + 1})`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${colonne + 1})`).classList.toggle("th-sort-desc", !asc);
}

function showToast(message = "Réservation annulée avec succès") {
    const toast = document.getElementById("confirmation_message");
    toast.textContent = message;
    toast.style.display = "block";

    setTimeout(() => {
        toast.style.display = "none";
    }, 3000); // 3 secondes
}

// Gestion du tri
document.querySelectorAll(".table_reservation th").forEach(headerCell => {
    headerCell.addEventListener("click", () => {
        const tableElement = headerCell.closest("table");
        const headerIndice = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        const estAsc = headerCell.classList.contains("th-sort-asc");

        TrieTableauParColonne(tableElement, headerIndice, !estAsc);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const btnAnnuler = document.querySelectorAll(".btnAnnuler");
    const confirmationPopup = document.getElementById("confirmationPopup");
    const btnConfirm = document.getElementById("btnConfirm");
    const btnCancel = document.getElementById("btnCancel");
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

    if (tbody.children.length === 0) {
        table.style.display = "none";
        if (message) message.style.display = "block";
    } else {
        table.style.display = "table";
        if (message) message.style.display = "none";
    }
}

window.addEventListener("DOMContentLoaded", () => {
    verifierTableVide();
});

// Permet de mettre en couleur en fonction de la date de fin
// Rouge : date passée
// Orange : date dans 3 jours ou moins
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
        /*else {
            row.style.backgroundColor = "#ccffcc"; // vert : plus de 3 jours
        } */
    });
});
