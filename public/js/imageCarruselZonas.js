document.addEventListener("DOMContentLoaded", function () {
    const mainPhoto = document.getElementById("mainPhoto");
    const imgCarousels = document.querySelectorAll(".imgCarousel");
    const togglePauseButton = document.getElementById("togglePause");
    const pauseIcon = document.getElementById("pauseIcon");
    let currentIndex = 0;
    const intervalTime = 3000;
    let isPaused = false;
    let isFullscreen = false;

    function updateActiveImage() {
        imgCarousels.forEach((img, index) => {
            img.classList.remove("active", "inactive"); 
            if (index === currentIndex) {
                img.classList.add("active"); 
            } else {
                img.classList.add("inactive"); 
            }
        });
        mainPhoto.src = imgCarousels[currentIndex].src;
    }

    updateActiveImage();

    function showNextImage() {
        currentIndex = (currentIndex + 1) % imgCarousels.length;
        updateActiveImage();
    }

    let autoChange = setInterval(showNextImage, intervalTime);
    pauseIcon.src = "/assets/iconos/boton-de-pausa.png";

    function togglePause() {
        if (isPaused) {
            autoChange = setInterval(showNextImage, intervalTime);
            pauseIcon.src = "/assets/iconos/boton-de-pausa.png";
        } else {
            clearInterval(autoChange);
            pauseIcon.src = "/assets/iconos/boton-de-play.png";
        }
        isPaused = !isPaused;
    }

    togglePauseButton.addEventListener("click", togglePause);

    imgCarousels.forEach((img, index) => {
        img.addEventListener("click", function () {
            clearInterval(autoChange);
            currentIndex = index;
            updateActiveImage();
            if (!isPaused) {
                autoChange = setInterval(showNextImage, intervalTime);
            }
        });
    });

    mainPhoto.addEventListener("click", function () {
        if (isFullscreen) {
            mainPhoto.classList.remove("fullscreen");
            isFullscreen = false;
            if (!isPaused) {
                autoChange = setInterval(showNextImage, intervalTime);
            }
        } else {
            mainPhoto.classList.add("fullscreen");
            isFullscreen = true;
            clearInterval(autoChange);
        }
    });
});
