<article class="rounded-lg shadow-lg overflow-hidden bg-white hover:shadow-2xl transition-shadow duration-300">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover']); ?>
        </a>
    <?php endif; ?>

    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-4">
            <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800 transition duration-300">
                <?php the_title(); ?>
            </a>
        </h2>
        <div class="text-gray-600 text-base mb-4">
            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
        </div>
        <div class="text-gray-400 text-sm">
            <p>Publié le <?php echo get_the_date(); ?></p>
        </div>
    </div>
</article>
