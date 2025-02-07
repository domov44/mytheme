<?php

function mytheme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    register_nav_menu('main', 'Menu Principal');
    register_nav_menu('footer-menu', 'Menu footer');

    function allow_svg_uploads($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    add_filter('upload_mimes', 'allow_svg_uploads');
}

add_action('after_setup_theme', 'mytheme_setup');
