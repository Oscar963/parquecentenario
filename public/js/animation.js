
document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".entre img");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("blur-in-expand");
                entry.target.style.opacity = 1; 
                observer.unobserve(entry.target); 
            }
        });
    });

    images.forEach((img) => observer.observe(img));
});

/*document.addEventListener("DOMContentLoaded", function () {
    const divs = document.querySelectorAll(".grid-normas > div");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                
                entry.target.classList.add("blur-in-expand");
                entry.target.style.opacity = 1;
                observer.unobserve(entry.target); 
            }
        });
    });

    // Observa cada div
    divs.forEach((div) => observer.observe(div));
});*/
