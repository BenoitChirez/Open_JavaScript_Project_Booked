/**
 * Fonction qui permettra de trier une table HTML
 * 
 * @param {HTMLTableElement} table La table à trier
 * @param {Number} colonne L'indice de la colone à trier
 * @param {Boolean} asc Va déterminer si le trie sera dans l'ordre croissant ou décroissant
 */
function TrieTableauParColonne(table, colonne, asc = true){
    const tableBody = table.tBodies[0]; // Séléctionne la partie <tbody></tbody> de notre tableau.
    const tableRows = Array.from(tableBody.querySelectorAll("tr")); // Séléctionne toutes les lignes du tableau et les mets dans un tableau.
    const dirModif = asc ? 1 : -1;

    // Si la colonne est la dernière
    if (colonne === table.rows[0].cells.length - 1) {
        return; // On ne fait rien et on retourne rien.
    }

    // Focntion de tri
    const trieRows = tableRows.sort((a,b) => { // sort va trier toutes les lignes en fonction de la valeur des éléments de la colonne choisie. 
        const colAValue = a.querySelector(`td:nth-child(${colonne + 1})`).textContent.trim(); // Séléctionne les noms d'auteur
        const colBValue = b.querySelector(`td:nth-child(${colonne + 1})`).textContent.trim(); // idem

        return colAValue > colBValue ? (1 * dirModif) : (-1 * dirModif);
    });

    // On supprime toutes les lignes du tableau
    while (tableBody.firstChild){
        tableBody.removeChild(tableBody.firstChild);
    }

    // On réaffiche toutes les lignes (mais elles seront triés)
    // Ajout avec animation
    trieRows.forEach(row => {
        row.classList.remove("animated-row"); // reset
        void row.offsetWidth; // force reflow
        row.classList.add("animated-row");
        tableBody.appendChild(row);
    });

    // On va enregistrer comment les colonnes sont déjà triées
    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc")); // fait en sorte que lorsque on clique sur un autre th, on supprime le th-sort-asc/desc existant, cela en fait donc un a la fois.
    table.querySelector(`th:nth-child(${colonne + 1})`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${colonne + 1})`).classList.toggle("th-sort-desc", !asc);
}

document.querySelectorAll(".table_reservation th").forEach(headerCell => {
    headerCell.addEventListener("click", () => { // On crée un événemet qui dès lors qu'on clique sur un élément du haut du tableau, le tableau va se trier en fonction de la cellule th la colonne par laquelle on souhaite trier
        const tableElement = headerCell.parentElement.parentElement.parentElement; // On choisi le tableau. (th => th => thead => table)
        const headerIndice = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell); // Donne l'indice de la ligne du haut (Titres) par colone. ()
        const estAsc = headerCell.classList.contains("th-sort-asc"); // regarder si la classe th-sort-asc est appliqué à th

        TrieTableauParColonne(tableElement, headerIndice, !estAsc); // Application de la fonction.
    });
});