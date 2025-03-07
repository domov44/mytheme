<?php
get_header();
$current_category_slug = get_query_var('category_name');
$current_category = get_category_by_slug($current_category_slug);
$category_title = ($current_category && !is_wp_error($current_category)) ? $current_category->name : get_the_title(get_option('page_for_posts'));
set_query_var('current_category', $current_category);
?>

<main>
    <div class="mytheme-content">
        <h1><?php echo esc_html($category_title); ?></h1>
        <?php get_template_part('partials/post', 'categories'); ?>

        <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">
            <?php get_template_part('partials/post', 'results'); ?>
        </div>
        <?php get_template_part('partials/global', 'pagination'); ?>
    </div>
</main>

<?php get_footer(); ?>