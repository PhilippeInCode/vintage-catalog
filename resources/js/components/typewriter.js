const text = "El legado de la moda permanente";
let i = 0;
let deleting = false;
let target = document.getElementById("typing-text");
let delay = 100;
let pauseTime = 0;

function typeEffect() {
    if (!target) return;

    if (!deleting) {
        target.innerHTML = text.substring(0, i + 1);
        i++;
    } else {
        target.innerHTML = text.substring(0, i - 1);
        i--;
    }

    if (i === text.length) {
        deleting = true;
        pauseTime = 2000;
    }
    else if (i === 0 && deleting) {
        deleting = false;
        pauseTime = 1000;
    } else {
        pauseTime = delay;
    }

    setTimeout(typeEffect, pauseTime);
}

document.addEventListener('DOMContentLoaded', () => {
    if (target) typeEffect();
});
