
document.addEventListener("DOMContentLoaded", function () {
    const selector = document.getElementById("name-selector");
    const title = document.getElementById("dynamic-title");
    selector.addEventListener("change", function () {
            title.textContent = selector.value;
    });
});
