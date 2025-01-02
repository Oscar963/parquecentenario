const navLinks = document.querySelectorAll(".nav-normas a");
const infoSections = document.querySelectorAll(".info1");

infoSections.forEach((section) => {
    if (section.id !== "zona-cultural") {
        section.classList.add("hidden");
    }
});

navLinks[0].classList.add("active");

navLinks.forEach((navLink) => {
    navLink.addEventListener("click", function (event) {
        event.preventDefault();

        const targetId = navLink.getAttribute("href").substring(1);

        infoSections.forEach((section) => {
            section.classList.add("hidden");
        });

        const targetSection = document.getElementById(targetId);
        if (targetSection) {
            targetSection.classList.remove("hidden");
        }

        navLinks.forEach((link) => link.classList.remove("active"));
        navLink.classList.add("active");
    });
});
