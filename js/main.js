document.querySelector('.navbar-toggler').addEventListener('click', function() {
    const navbar = document.querySelector('.navbar');
    if (navbar.classList.contains('show')) {
        navbar.classList.remove('show');
    } else {
        navbar.classList.add('show');
    }
});

// Fungsi untuk mengubah tema (Dark Mode / Light Mode)
function toggleDarkMode() {
    const body = document.body;
    const darkModeToggle = document.getElementById("darkModeToggle");

    if (darkModeToggle.checked) {
        body.setAttribute("data-bs-theme", "dark"); // Atur tema ke Dark Mode
    } else {
        body.setAttribute("data-bs-theme", "light"); // Atur tema ke Light Mode
    }
}

// Event listener untuk menangani perubahan toggle
const darkModeToggle = document.getElementById("darkModeToggle");
darkModeToggle.addEventListener("change", toggleDarkMode);

// Memeriksa status Dark Mode saat halaman dimuat
window.addEventListener("load", function () {
    toggleDarkMode();
});

