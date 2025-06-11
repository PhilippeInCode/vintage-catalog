document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById("message");
    const counter = document.getElementById("charCount");

    if (!textarea || !counter) return;

    textarea.addEventListener("input", () => {
        counter.textContent = `${textarea.value.length}/500`;
    });
});
