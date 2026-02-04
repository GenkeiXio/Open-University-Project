document.addEventListener("DOMContentLoaded", () => {
    // FAQ ACCORDION
    const faqItems = document.querySelectorAll(".faq-item");

    faqItems.forEach(item => {
        const question = item.querySelector(".faq-question");

        question.addEventListener("click", () => {
            const isActive = item.classList.contains("active");

            // Close all FAQs
            faqItems.forEach(i => i.classList.remove("active"));

            // Toggle clicked FAQ
            if (!isActive) {
                item.classList.add("active");
            }
        });
    });
});
