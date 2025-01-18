const sidebar = document.querySelector('.sidebar');
const openSidebar = document.getElementById('open-sidebar');
const closeSidebar = document.getElementById('close-sidebar');
const mainContent = document.querySelector('.main-content');

// Event untuk membuka sidebar
openSidebar.addEventListener('click', () => {
    sidebar.classList.add('open');
    mainContent.classList.add('menu-open');
});

// Event untuk menutup sidebar
closeSidebar.addEventListener('click', () => {
    sidebar.classList.remove('open');
    mainContent.classList.remove('menu-open');
});
