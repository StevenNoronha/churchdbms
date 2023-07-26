const toggleButton = document.getElementById("toggle");
const navLinks = document.getElementById("togglen");
const button = document.getElementById("togglenew");

toggleButton.addEventListener('click', () => {
    navLinks.classList.toggle("active");
    button.classList.toggle("active");
})