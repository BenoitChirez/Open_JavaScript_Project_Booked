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

// Gestion du tri
document.querySelectorAll(".table_reservation th").forEach(headerCell => {
    headerCell.addEventListener("click", () => {
        const tableElement = headerCell.closest("table");
        const headerIndice = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        const estAsc = headerCell.classList.contains("th-sort-asc");

        TrieTableauParColonne(tableElement, headerIndice, !estAsc);
    });
});

let rowToDelete = null;

document.querySelectorAll(".table_reservation button").forEach(button => {
    button.addEventListener("click", function () {
        rowToDelete = this.closest("tr");
        document.getElementById("confirmationPopup").classList.remove("hidden");
    });
});

// Bouton Annuler
document.getElementById("btnCancel").addEventListener("click", function () {
    rowToDelete = null;
    document.getElementById("confirmationPopup").classList.add("hidden");
});

// Bouton Confirmer
document.getElementById("btnConfirm").addEventListener("click", function () {
    if (rowToDelete) {
        rowToDelete.classList.add("fade-out");
        setTimeout(() => {
            rowToDelete.remove();
            rowToDelete = null;
            verifierTableVide(); // Vérifie après suppression
        }, 400);
    }
    document.getElementById("confirmationPopup").classList.add("hidden");
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
