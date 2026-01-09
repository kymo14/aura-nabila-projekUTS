document.addEventListener("DOMContentLoaded", function () {

    const menuBar = document.querySelector('#content nav .bx-menu');
    const sidebar = document.getElementById('sidebar');

    if (menuBar && sidebar) {
        menuBar.addEventListener('click', function () {
            sidebar.classList.toggle('hide');
        });
    }

});