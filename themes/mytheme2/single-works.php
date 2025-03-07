<?php get_header(); ?>
<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="content">
                <h1><?php the_title(); ?></h1>
                <p><strong>Rôle :</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_work_role', true)); ?></p>
            </div>
    <?php endwhile;
    endif; ?>
</main>
<?php get_footer(); ?>