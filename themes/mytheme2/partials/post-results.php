<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts_per_page = 10;

$args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged
);

if ($current_category) {
    $args['category_name'] = $current_category->slug;
}

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
?>
        <article class="has-surface-background-color p-5 rounded-md">
            <?php if (has_post_thumbnail()) : ?>
                <div class="aspect-video aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-60">
                    <?php the_post_thumbnail('large', array('class' => "h-full w-full object-cover object-center lg:h-full lg:w-full")); ?>
                </div>
            <?php endif; ?>

            <div class="my-4 flex flex-col justify-between">
                <p class="w-fit py-1 px-3 text-sm font-medium rounded-full bg-indigo-600 text-white hover:bg-indigo-400"><?php the_category(', '); ?></p>
                <h2><?php the_title(); ?></h2>

                <a class="mt-4 has-primary-color text-sm" href="<?php the_permalink(); ?>">
                    Read the post
                </a>
            </div>
        </article>

    <?php
    endwhile;
    ?>

<?php
    wp_reset_postdata();
else:
    echo '<p style="text-align: center; background: white;z-index:5;">Aucun article trouvé</p>';
endif;
?>