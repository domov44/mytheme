<?php get_header(); ?>

<main>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            $content = get_the_content();
            $blocks = parse_blocks($content);

            render_custom_blocks($blocks);

        endwhile;
    else :
        echo '<p>Aucun contenu trouvé</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>