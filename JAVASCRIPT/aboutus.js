

// Attend que tout le contenu  de la page  charge avant d'executer 
window.addEventListener("DOMContentLoaded", () => {

    // Récupère l'élément HTML qui sert de "tooltip" (bulle d'info)
    const tooltip = document.getElementById("tooltip");
    const images = document.querySelectorAll(".photo-row img");

    //  associe un nom à une description 
    const descriptions = {
        "1": "Adam, sosie officiel de Tchoupi.",
        "2": "Benoit , la (im)patience incarne.",
        "3": "Maxence: SUPER MEGA STYLE.",
        "4": "Samuel, Trafficant de petits LU.",
        "5": "Shalom, Defenseur au real Madrid."
    };

    
    images.forEach((img) => {

        // passe sur l'image
        img.addEventListener("mouseover", () => {
            const studentName = img.alt;
            // Affiche le texte correspondant à l'image (en fonction du nom)
            tooltip.textContent = descriptions[studentName] || "Pas d'info dispo";
            tooltip.style.display = "block"; 
        });

        // la souris quitte l'image.
        img.addEventListener("mouseout", () => {
            tooltip.style.display = "none"; // rend la boite de texte invisible
        });
    });
});

