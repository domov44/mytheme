<?php

function mytheme_enqueue_assets()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('mytheme-script', get_template_directory_uri() . '/assets/js/script.js', ['jquery'], '1.0', true);

    wp_enqueue_style('mytheme-style', get_template_directory_uri() . '/assets/css/style.css', '1.0');
    wp_enqueue_style('mytheme-variable-style', get_template_directory_uri() . '/assets/css/variable.css', '1.0');
    wp_enqueue_style('mytheme-reset-style', get_template_directory_uri() . '/assets/css/reset.css', '1.0');
    wp_enqueue_style('mytheme-block-hero-style', get_template_directory_uri() . '/blocks/hero/style.css', '1.0');
    wp_enqueue_style('mytheme-block-editor-hero-style', get_template_directory_uri() . '/blocks/hero/editor.css', '1.0');
}

add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');
