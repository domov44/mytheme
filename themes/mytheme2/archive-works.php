<?php
get_header();
?>

<main>
    <div class="mytheme-content">
        <div class="work-archive">
            <?php if (have_posts()) : ?>
                <div class="work-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="work-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="work-thumbnail">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </div>
                                <?php endif; ?>
                                <h2 class="work-title"><?php the_title(); ?></h2>
                            </a>

                            <div class="work-taxonomies">
                                <?php
                                $taxonomies = get_object_taxonomies(get_post_type(), 'objects');
                                foreach ($taxonomies as $taxonomy) {
                                    $terms = get_the_terms(get_the_ID(), $taxonomy->name);
                                    if ($terms && !is_wp_error($terms)) {
                                        echo '<div class="work-taxonomy">';
                                        echo '<strong>' . esc_html($taxonomy->label) . ':</strong> ';
                                        $term_links = [];
                                        foreach ($terms as $term) {
                                            $term_links[] = '<a href="' . get_term_link($term) . '">' . esc_html($term->name) . '</a>';
                                        }
                                        echo implode(', ', $term_links);
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="pagination">
                    <?php
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => __('« Précédent', 'textdomain'),
                        'next_text' => __('Suivant »', 'textdomain'),
                    ));
                    ?>
                </div>
            <?php else : ?>
                <p>Aucun contenu trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>