/* JavaScript do Menu Hambúrguer */
document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.getElementById('menu-hamburger');
    const menu = document.getElementById('menu');

    if (hamburger && menu) {
        hamburger.addEventListener('click', () => {
            menu.classList.toggle('active');

            if (menu.classList.contains('active')) {
                hamburger.textContent = '✕';
            } else {
                hamburger.textContent = '☰';
            }
        });
    }

    /* JavaScript para selecionar todos os checkboxes */
    const selecionarTodos = document.getElementById('selecionarTodos');

    if (selecionarTodos) {
        selecionarTodos.addEventListener('change', function () {
            const checkboxes = document.querySelectorAll('input[name="reservas[]"]');
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = selecionarTodos.checked;
            });
        });
    }
});