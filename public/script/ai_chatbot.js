document.addEventListener("DOMContentLoaded", () => {
    const chatToggle = document.getElementById("chatToggle");
    const chatBox = document.getElementById("chatBox");
    const chatClose = document.getElementById("chatClose");

    chatToggle.addEventListener("click", () => {
        chatBox.classList.add("active");
    });

    chatClose.addEventListener("click", () => {
        chatBox.classList.remove("active");
    });
});