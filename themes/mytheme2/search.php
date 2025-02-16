<?php
get_header();
$arg = get_search_query();
set_query_var('arg', $arg);
?>
<main>
    <h1>Vous avez recherché : <?php echo $arg; ?></h1>
    <div class="content">
        <?php get_template_part('partials/search', 'results'); ?>
        <?php get_template_part('partials/global', 'pagination'); ?>
    </div>
</main>

<?php get_footer(); ?>