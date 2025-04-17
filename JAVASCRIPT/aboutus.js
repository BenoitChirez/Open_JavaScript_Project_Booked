

window.addEventListener("DOMContentLoaded", () => {
    const tooltip = document.getElementById("tooltip");
    const images = document.querySelectorAll(".photo-row img");
    
    const descriptions = {
        "1": "Adam, sosie officiel de Tchoupi.",
        "2": "Benoit , la (im)patience incarné.",
        "3": "Maxence: SUPER MEGA STYLE.",
        "4": "Samuel, Trafficant de petits LU.",
        "5": "Shalom, ."
    };

    images.forEach((img) => {
        img.addEventListener("mouseover", () => {
            const studentName = img.alt;
            tooltip.textContent = descriptions[studentName] || "Pas d'info dispo";
            tooltip.style.display = "block";
        });

        img.addEventListener("mouseout", () => {
            tooltip.style.display = "none";
        });
    });
});
