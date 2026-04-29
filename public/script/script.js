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

document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".faculty-publications").forEach(section => {

        const search = section.querySelector(".pub-search");
        const filters = section.querySelectorAll(".pub-filter");
        const cards = section.querySelectorAll(".pub-card");
        const count = section.querySelector(".pub-count");

        let active = "all";

        function update() {
            let visible = 0;
            const q = search.value.toLowerCase();

            cards.forEach(card => {
                const matchSearch = card.textContent.toLowerCase().includes(q);
                const matchFilter = active === "all" || card.dataset.type === active;

                const show = matchSearch && matchFilter;
                card.style.display = show ? "" : "none";

                if(show) visible++;
            });

            count.textContent = `${visible} publications`;
        }

        filters.forEach(btn => {
            btn.addEventListener("click", () => {
                filters.forEach(b => b.classList.remove("active"));
                btn.classList.add("active");
                active = btn.dataset.filter;
                update();
            });
        });

        search.addEventListener("input", update);

    });

});