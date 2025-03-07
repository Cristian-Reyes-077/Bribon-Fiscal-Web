document.addEventListener("DOMContentLoaded", function () {
    // Selector de nombres dinámico
    const selector = document.getElementById("name-selector");
    const title = document.getElementById("dynamic-title");

    if (selector && title) {
        selector.addEventListener("change", function () {
            title.textContent = selector.value;
        });
    }

    // Menú lateral
    const menuToggle = document.getElementById("menuToggle");
    const sidebar = document.getElementById("sidebar");
    const closeSidebar = document.getElementById("closeSidebar");

    if (menuToggle && sidebar && closeSidebar) {
        // Abrir el menú lateral
        menuToggle.addEventListener("click", function () {
            sidebar.classList.add("active");
        });

        // Cerrar el menú lateral
        closeSidebar.addEventListener("click", function () {
            sidebar.classList.remove("active");
        });

        // Cerrar el menú si se hace clic fuera de él
        document.addEventListener("click", function (event) {
            if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                sidebar.classList.remove("active");
            }
        });
    }
});
