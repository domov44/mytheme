<?php
$page = get_query_var('paged');

$query = array(
    'post_status'   => 'publish',
    'post_type' => array('post', 'page'),
    's' => $arg,
    'paged' => $page,
    'posts_per_page' => 10
);

$custom_query = new WP_Query($query);
$s = $custom_query->found_posts > 1 ? 's' : '';


wp_reset_postdata();
?>


<h2><span class="u-showcase"><?= '<p>' . $custom_query->found_posts . " résultat$s trouvé$s</p>"; ?></span></h2>
<div class="grid-layout search-container">
    <?php if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <article class="search-composent">

                <div class="thumbnail">
                    <?php the_post_thumbnail('large');   ?>
                </div>
                <div class="text-container">
                    <span class="bullet">
                        <?php
                        $post_type = get_post_type();
                        echo $post_type === 'post' ? 'Article' : ucfirst($post_type);
                        ?>
                    </span>

                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <div class="wp-block-button is-style-goto-button"><a class="btn--accent-1" href="<?php the_permalink(); ?>">Découvrir</a></div>
                </div>

            </article>
    <?php endwhile;
    endif; ?>
</div>
