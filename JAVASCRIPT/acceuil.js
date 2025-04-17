let hasScrolled = false;

function showScrollEffects() {
    document.querySelectorAll(".scroll-effect").forEach(el => {
        if (el.getBoundingClientRect().top < window.innerHeight - 100) {
            el.classList.add("visible");
        }
    });
}

document.addEventListener("scroll", function () {
    hasScrolled = true;

    showScrollEffects();
});

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

        sparkleContainer.appendChild(sparkle);
    }
});

