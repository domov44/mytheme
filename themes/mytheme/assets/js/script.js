
document.addEventListener('DOMContentLoaded', function () {
    const searchToggle = document.getElementById('search-toggle');
    const searchContainer = document.getElementById('search-container');
    const searchClose = document.getElementById('search-close');

    // Ouvrir le formulaire de recherche
    searchToggle.addEventListener('click', () => {
        searchContainer.classList.remove('hidden');
        searchContainer.querySelector('input[name="s"]').focus();
    });

    // Fermer le formulaire de recherche
    searchClose.addEventListener('click', () => {
        searchContainer.classList.add('hidden');
    });

    // Fermer avec la touche Échap
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            searchContainer.classList.add('hidden');
        }
    });
});
