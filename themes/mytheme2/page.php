<?php get_header(); ?>
<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="content">
                <?php the_content(); ?>
            </div>
    <?php endwhile;
    endif; ?>
</main>
<?php get_footer(); ?>