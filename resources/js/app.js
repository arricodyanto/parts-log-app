import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// preloader
$(function () {
    $(".preload").fadeOut(600, () => {
        this.isLoading = false;
        $(".content").fadeIn(500);
    });
});

// on scroll navbar
const navbar = document.getElementById("navbar");
window.onscroll = () => {
    if (window.scrollY > 50) {
        navbar.classList.add("bg-white", "backdrop-blur-md");
    } else {
        navbar.classList.remove("bg-white", "backdrop-blur-md");
    }
};
