document.addEventListener('DOMContentLoaded', () => {
    const follower = document.getElementById('cursor-follower');
    if (!follower) return;

    document.addEventListener('mousemove', (e) => {
        const { clientX, clientY } = e;
        follower.style.transform = `translate(${clientX - 10}px, ${clientY - 10}px)`;
    });

    document.addEventListener('mousedown', () => {
        follower.style.transform += ' scale(1.5)';
        follower.style.backgroundColor = 'rgba(200, 100, 50, 0.8)';
    });

    document.addEventListener('mouseup', () => {
        follower.style.transform = follower.style.transform.replace(' scale(1.5)', '');
        follower.style.backgroundColor = 'rgba(80, 60, 40, 0.8)';
    });
});
