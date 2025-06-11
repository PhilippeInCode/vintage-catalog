import './bootstrap';

import Alpine from 'alpinejs';

import AOS from 'aos';
import 'aos/dist/aos.css';

window.Alpine = Alpine;

Alpine.start();

AOS.init();

document.addEventListener('DOMContentLoaded', () => {
    const text = "El legado de la moda permanente";
    const target = document.getElementById("typing-text");
    let i = 0;
    let isDeleting = false;

    function loopTyping() {
        if (!target) return;

        if (!isDeleting) {
            target.innerHTML = text.substring(0, i + 1);
            i++;
            if (i === text.length) {
                isDeleting = true;
                setTimeout(loopTyping, 1500); 
                return;
            }
        } else {
            target.innerHTML = text.substring(0, i - 1);
            i--;
            if (i === 0) {
                isDeleting = false;
                setTimeout(loopTyping, 1000); 
                return;
            }
        }

        setTimeout(loopTyping, isDeleting ? 50 : 70);
    }

    loopTyping();
});
