<nav class="flex flex-wrap gap-2 mt-4">
    <?php
    $current_category = get_query_var('category_name');
    ?>
    <a class="py-2 px-3 text-sm font-medium rounded-full <?= ($current_category == null) ? 'active bg-indigo-400 text-white' : 'bg-indigo-600 text-white hover:bg-indigo-400' ?>" href="<?= get_permalink(get_option('page_for_posts')) ?>">Tout</a>
    <?php
    $categories = get_categories();

    foreach ($categories as $category) {
        $class = ($current_category == $category->slug) ? 'active bg-indigo-400 text-white' : 'bg-indigo-600 text-white hover:bg-indigo-400';
    ?>
        <a class="py-2 px-3 text-sm font-medium rounded-full <?= $class ?>" href="<?= get_category_link($category->term_id) ?>"><?= $category->name ?></a>
    <?php
    }
    ?>
</nav>