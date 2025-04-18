// Variable: savoir si l'utilisateur a d�j� scrolle
let hasScrolled = false;

// Fonction qui rend visibles les �l�ments avec la classe "scroll-effect" quand ils apparaissent � l'�cran
function showScrollEffects() {
    document.querySelectorAll(".scroll-effect").forEach(el => {
        //
        if (el.getBoundingClientRect().top < window.innerHeight - 100) {
            el.classList.add("visible");//rend visible
        }
    });
}

// event d�clenche quand on scrol
document.addEventListener("scroll", function () {
    hasScrolled = true; // On note que le scroll a eu lieu
    showScrollEffects();
});

//si l'utilisateur ne scrolle pas dans les 5s, on affiche quand m�me les effets visibles
setTimeout(() => {
    if (!hasScrolled) {
        showScrollEffects();
    }
}, 5000);


document.addEventListener("DOMContentLoaded", function () {
    
    const sparkleContainer = document.querySelector(".sparkle-container");

    
    for (let i = 0; i < 80; i++) {
        const sparkle = document.createElement("div"); 
        sparkle.classList.add("sparkle"); 

        
        const x = Math.random() * window.innerWidth;
        const y = Math.random() * window.innerHeight;

       
        const delay = Math.random() * 5; 
        const duration = 2 + Math.random() * 3; 

       
        sparkle.style.left = `${x}px`;
        sparkle.style.top = `${y}px`;
        sparkle.style.animationDelay = `${delay}s`;
        sparkle.style.animationDuration = `${duration}s`;

        // Ajouter l'�l�ment dans le conteneur
        sparkleContainer.appendChild(sparkle);
    }
});
