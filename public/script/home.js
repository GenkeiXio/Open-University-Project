document.addEventListener("DOMContentLoaded", function () {

    const welcomeData = {
        0: {
            title: "Message from the Dean",
            text: "Welcome to Bicol University Open University. We are committed to delivering innovative, flexible, and globally competitive distance education for lifelong learners.",
            name: "Dr. Benedicto B. Balilo Jr.",
            position: "Dean, Bicol University Open University"
        },
        1: {
            title: "Message from the Associate Dean",
            text: "We aim to strengthen academic excellence, digital learning innovation, and student-centered support systems to ensure success in open and distance learning.",
            name: "Prof. Jose Carlo B. Lavapie",
            position: "Associate Dean, Bicol University Open University"
        }
    };

    const facultySlider = document.getElementById("facultySlider");
    const card = document.querySelector(".welcome-card");

    function updateWelcome(index) {
        if (!card) return;

        card.classList.add("fade-out");

        setTimeout(() => {
            document.getElementById("welcomeTitle").textContent = welcomeData[index].title;
            document.getElementById("welcomeText").textContent = welcomeData[index].text;
            document.getElementById("welcomeSignature").textContent = welcomeData[index].name;
            document.getElementById("welcomePosition").textContent = welcomeData[index].position;

            card.classList.remove("fade-out");
        }, 250);
    }

    // When slide changes (auto or manual)
    facultySlider.addEventListener("slid.bs.carousel", function (event) {
        updateWelcome(event.to);
    });

    // Default load
    updateWelcome(0);
});