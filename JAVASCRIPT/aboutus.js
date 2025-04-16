

window.addEventListener("DOMContentLoaded", () => {
    const tooltip = document.getElementById("tooltip");
    const images = document.querySelectorAll(".photo-row img");
    
    const descriptions = {
        "1": "Adam, passionné par l'IA et les outils numériques.",
        "2": "Benoît, fan de backend et des systèmes distribués.",
        "3": "Max, créatif, aime les belles interfaces.",
        "4": "Sam, expert mobile et optimisation.",
        "5": "Shalom, focus cybersécurité et données perso."
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
