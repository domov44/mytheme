<?php

// Import theme assets (template & blocks)
//_________
include get_template_directory() . '/lib/core/theme-support.php';
include get_template_directory() . '/lib/core/custom-post-type.php';
// include(get_template_directory() . '/lib/gutenberg/hook/hooks.php');
include(get_template_directory() . '/lib/gutenberg/blocks/gutenberg.php');
include(get_template_directory() . '/blocks/register-block.php');



// Import assets
//_________
function mytheme_enqueue_assets()
{
    wp_enqueue_style('theme-tailwind', get_template_directory_uri() . '/assets/styles/tailwind-output.css', array(), '1.0.0');

    wp_enqueue_style('my-theme-style', get_stylesheet_directory_uri() . '/assets/styles/styles.css', array(), "0.0.1");
    wp_enqueue_script('mytheme-script', get_stylesheet_directory_uri() . '/assets/scripts/script.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets', PHP_INT_MAX);


// Import assets admin
//_________
function enqueue_admin()
{
    wp_enqueue_style('app_global_style', get_stylesheet_directory_uri() . '/assets/styles/admin.css');
    wp_enqueue_script('mytheme-script', get_stylesheet_directory_uri() . '/assets/scripts/script.js', array(), null, true);
}
add_action('admin_enqueue_scripts', 'enqueue_admin');