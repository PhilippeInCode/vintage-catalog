const text = "El legado de la moda permanente";
let i = 0;
let deleting = false;
let target = document.getElementById("typing-text");

function typeEffect() {
    if (!target) return;
    if (!deleting && i <= text.length) {
        target.innerHTML = text.substring(0, i);
        i++;
    } else if (deleting && i >= 0) {
        target.innerHTML = text.substring(0, i);
        i--;
    }

    if (i === text.length) deleting = true;
    if (i === 0) deleting = false;

    setTimeout(typeEffect, 100);
}

document.addEventListener('DOMContentLoaded', () => {
    if (target) typeEffect();
});
