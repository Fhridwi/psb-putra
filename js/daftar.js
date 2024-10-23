const menuBtn = document.getElementById('menu-btn');
const dropdownMenu = document.getElementById('dropdown-menu');
const navbar = document.querySelector('.navbar');

menuBtn.addEventListener('click', function() {
    dropdownMenu.classList.toggle('hidden');
});

window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});