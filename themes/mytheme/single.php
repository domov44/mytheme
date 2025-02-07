<?php get_header(); ?>
<main class="container mx-auto px-4 py-8">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
            <article class="mb-12">
                <!-- Image mise en avant en pleine page -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-6">
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-auto object-cover">
                    </div>
                <?php endif; ?>

                <header class="mb-6">
                    <h1 class="text-4xl font-bold leading-tight mb-4"><?php the_title(); ?></h1>
                    <div class="text-sm text-gray-600">
                        <span class="mr-4"><?php echo get_the_date(); ?></span>
                        <span class="mr-4">Par <?php the_author(); ?></span>
                    </div>
                </header>

                <div class="prose lg:prose-xl">
                    <?php the_content(); ?>
                </div>

                <footer class="mt-8">
                    <?php
                    echo '<div class="text-sm text-gray-600">';
                    the_category(', ');
                    echo '</div>';
                    ?>
                </footer>
            </article>
    <?php
        endwhile;
    else :
        echo '<p>Aucun contenu trouvé</p>';
    endif;
    ?>
</main>
<?php get_footer(); ?>