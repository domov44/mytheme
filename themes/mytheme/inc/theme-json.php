<?php

function mytheme_generate_theme_json()
{
    $theme_json_path = get_template_directory() . '/theme.json';

    $colors = array(
        array("name" => "Primary", "slug" => "primary", "color" => get_theme_mod('primary_color', '#3498db')),
        array("name" => "Secondary", "slug" => "secondary", "color" => get_theme_mod('secondary_color', '#e74c3c')),
        array("name" => "Content", "slug" => "content", "color" => get_theme_mod('content_color', '#ffffff')),
        array("name" => "Background", "slug" => "background", "color" => get_theme_mod('background_color', '#f5f5f5')),
        array("name" => "Surface", "slug" => "surface", "color" => get_theme_mod('surface_color', '#000000'))
    );

    $theme_json = array(
        "version" => 2,
        "settings" => array(
            "color" => array(
                "palette" => $colors,
                "defaultPalette" => false
            )
        )
    );

    file_put_contents($theme_json_path, json_encode($theme_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

add_action('customize_save_after', 'mytheme_generate_theme_json');
