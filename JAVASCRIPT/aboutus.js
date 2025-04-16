

window.addEventListener("DOMContentLoaded", () => {
    const tooltip = document.getElementById("tooltip");
    const images = document.querySelectorAll(".photo-row img");
    
    const descriptions = {
        "1": "Adam, passionn� par l'IA et les outils num�riques.",
        "2": "Beno�t, fan de backend et des syst�mes distribu�s.",
        "3": "Max, cr�atif, aime les belles interfaces.",
        "4": "Sam, expert mobile et optimisation.",
        "5": "Shalom, focus cybers�curit� et donn�es perso."
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
