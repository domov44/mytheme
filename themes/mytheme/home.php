<?php get_header(); ?>

<main class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part('template-parts/card-post');
                endwhile;
            else :
                echo '<p class="text-center text-gray-600">Aucun contenu trouvé</p>';
            endif;
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
