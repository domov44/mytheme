<?php get_header(); ?>
<main>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_title();
        endwhile;
    else :
        echo '<p>Aucun contenu trouvé</p>';
    endif;
    ?>
</main>
<?php get_footer(); ?>