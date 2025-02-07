<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <label for="search-input" class="sr-only">Rechercher :</label>
    <input type="search" id="search-input" class="search-field border rounded-l px-4 py-2 w-64" 
           placeholder="Rechercher un article..." 
           value="<?php echo get_search_query(); ?>" 
           name="s" 
           required />

    <button type="submit" class="search-submit bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600 transition">
        🔍
    </button>
</form>
