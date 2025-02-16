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
                <p class="text-sm"><?php the_category(', '); ?></p>
                <h2><?php the_title(); ?></h2>

                <div class="line-clamp-4"><?php the_excerpt(); ?></div>

                <a class="mt-4 btn--primary" href="<?php the_permalink(); ?>">
                    <svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.16255 17.9682L9.53495 9.70844L1.16261 1.92017" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    En savoir plus
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