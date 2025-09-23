const btnMenu = document.getElementById('btn-menu');
const sidebar = document.getElementById('sidebar');
const menu = document.querySelectorAll("#sidebar ul li a");

btnMenu.addEventListener('click', () => {
    menu.forEach(i => {

        i.classList.toggle('menu-mobile');
    });
    sidebar.classList.toggle('sidebar-mobile')
});