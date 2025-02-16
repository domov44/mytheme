/* Global scripts */


// Anim burger menu : Open/ close responsive
//_________
const header = document.querySelector('#header');
if (header) {
    document.querySelector('.burger__icon').addEventListener('click', openMenu)

    function openMenu() {
        header.classList.toggle('open__menu')
    }
    const navLinks = document.querySelectorAll('.navbar__item .action--element');

    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            console.log('click')
            if (header.classList.contains('open__menu')) {
                header.classList.remove('open__menu');
            }
        });
    });
}

// Anim search menu : Open/ close/ clean
//_________
const searchGroup = document.querySelector('.search__group');
const glassItem = document.querySelector('.search__group .action--element');
const allContent = document.querySelectorAll('main, footer');
const searchFields = document.getElementById("search-fields");

if (glassItem && searchGroup) {
    glassItem ? glassItem.addEventListener('click', toggleSearch) : ''
    allContent.forEach(content => {
        content.addEventListener('click', closeSearch);
    });
    if (searchFields) {
        const dataValue = searchFields.getAttribute('data-value');
        searchFields.value = dataValue;
    }
}
function openSearch() {
    searchGroup.classList.add("active");
    glassItem.removeEventListener('click', toggleSearch);
    glassItem.addEventListener('click', closeSearch);
}

function closeSearch() {
    searchGroup.classList.remove("active");
    glassItem.removeEventListener('click', closeSearch);
    glassItem.addEventListener('click', toggleSearch);
}
function toggleSearch() {
    if (searchGroup.classList.contains('active')) {
        closeSearch();
    } else {
        openSearch();
    }
}
function clearInput() {
    if (searchFields) {
        searchFields.value = "";
    }
}






// Tailwind Anim search menu : Open/ close/ clean
//_________
document.addEventListener("DOMContentLoaded", function () {
    const dropdownButtons = document.querySelectorAll("[data-dropdown-toggle]");

    dropdownButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            const submenuId = button.getAttribute("data-dropdown-toggle");
            const submenu = document.getElementById(submenuId);
            const isExpanded = button.getAttribute("aria-expanded") === "true";
            closeAllSubmenus();

            if (!isExpanded) {
                button.setAttribute("aria-expanded", "true");
                submenu.classList.remove("hidden");
                button.querySelector("svg").classList.add("rotate-180");
            }
            event.stopPropagation();
        });
    });
    function closeAllSubmenus() {
        dropdownButtons.forEach(button => {
            const submenu = document.getElementById(button.getAttribute("data-dropdown-toggle"));
            button.setAttribute("aria-expanded", "false");
            submenu.classList.add("hidden");
            button.querySelector("svg").classList.remove("rotate-180");
        });
    }
    document.addEventListener("click", function (event) {
        if (!event.target.closest('[data-dropdown-toggle]')) {
            closeAllSubmenus();
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");
    const closeMenuButton = document.getElementById("close-menu-button");
    const submenuButtons = document.querySelectorAll("[data-submenu-button]");

    mobileMenuButton.addEventListener("click", function () {
        mobileMenu.classList.remove("hidden");
    });

    closeMenuButton.addEventListener("click", function () {
        mobileMenu.classList.add("hidden");
    });
    document.addEventListener("click", function (event) {
        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.classList.add("hidden");
        }
    });

    submenuButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            event.stopPropagation();
            const submenuId = button.getAttribute("aria-controls");
            const submenu = document.getElementById(submenuId);
            const submenuIcon = button.querySelector("svg");
            const isExpanded = button.getAttribute("aria-expanded") === "true";
            button.setAttribute("aria-expanded", !isExpanded);
            submenu.classList.toggle("hidden");
            submenuIcon.classList.toggle("rotate-180");
        });
    });
});
