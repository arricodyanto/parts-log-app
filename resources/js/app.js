import "./bootstrap";

const navbar = document.getElementById("navbar");
window.onscroll = () => {
    if (window.scrollY > 50) {
        navbar.classList.add("bg-white", "backdrop-blur-sm");
    } else {
        navbar.classList.remove("bg-white", "backdrop-blur-sm");
    }
};
