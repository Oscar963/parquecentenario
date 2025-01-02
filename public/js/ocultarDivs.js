const links = document.querySelectorAll(".info a");
const sections = document.querySelectorAll(".norma");

sections.forEach((section) => {
    if (section.id !== "horarios") {
        section.classList.add("hidden");
    }
});

links[0].classList.add("active");

links.forEach((link) => {
    link.addEventListener("click", function (event) {
        event.preventDefault();

        const targetId = link.getAttribute("href").substring(1);

        sections.forEach((section) => {
            section.classList.add("hidden");
        });
        
        const targetSection = document.getElementById(targetId);
        if (targetSection) {
            targetSection.classList.remove("hidden");
        }

        links.forEach((link) => link.classList.remove("active"));
        link.classList.add("active");
    });
});


