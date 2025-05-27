import './bootstrap';

// document.addEventListener("DOMContentLoaded", function () {
//     const htmlElement = document.documentElement;

//     function applySavedTheme() {
//         const savedTheme = localStorage.getItem("theme");
//         if (savedTheme === "dark") {
//             htmlElement.classList.add("dark");
//             htmlElement.setAttribute("data-theme", "dark");
//         } else {
//             htmlElement.classList.remove("dark");
//             htmlElement.setAttribute("data-theme", "light");
//         }
//     }

//     function toggleDarkMode() {
//         if (htmlElement.classList.contains("dark")) {
//             htmlElement.classList.remove("dark");
//             htmlElement.setAttribute("data-theme", "light");
//             localStorage.setItem("theme", "light");
//         } else {
//             htmlElement.classList.add("dark");
//             htmlElement.setAttribute("data-theme", "dark");
//             localStorage.setItem("theme", "dark");
//         }
//     }

//     const themeToggle = document.getElementById("theme-toggle");
//     if (themeToggle) {
//         themeToggle.removeEventListener("click", toggleDarkMode); // prevent multiple bindings
//         themeToggle.addEventListener("click", toggleDarkMode);
//     }


//     applySavedTheme();

// });

document.addEventListener("DOMContentLoaded", function () {
    const htmlElement = document.documentElement;

    function toggleDarkMode() {
        const isDark = htmlElement.classList.contains("dark");
        htmlElement.classList.toggle("dark", !isDark);
        htmlElement.setAttribute("data-theme", isDark ? "light" : "dark");
        localStorage.setItem("theme", isDark ? "light" : "dark");
    }

    const themeToggle = document.getElementById("theme-toggle");
    if (themeToggle) {
        themeToggle.removeEventListener("click", toggleDarkMode);
        themeToggle.addEventListener("click", toggleDarkMode);
    }
});
