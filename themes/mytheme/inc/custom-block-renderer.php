<?php

/**
 * Fonction pour gérer l'affichage des blocs Gutenberg
 *
 * @param array $blocks Tableau des blocs Gutenberg
 */
function render_custom_blocks($blocks)
{
    foreach ($blocks as $block) {
        $block_name = isset($block['blockName']) ? $block['blockName'] : '';

        switch ($block_name) {
            case 'core/columns':
                echo '<section class="section">';
                echo '<div class="container">';
                echo apply_filters('the_content', render_block($block));
                echo '</div>';
                echo '</section>';
                break;

            default:
                echo apply_filters('the_content', render_block($block));
                break;
        }
    }
}
