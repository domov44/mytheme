<?php

function mytheme_customize_variable($wp_customize)
{
    $wp_customize->add_section('mytheme_colors', array(
        'title'    => __('Couleurs du thème', 'mytheme'),
        'priority' => 30,
    ));

    $colors = array(
        'primary_color'   => array('label' => __('Couleur Primaire', 'mytheme'), 'default' => '#3498db'),
        'secondary_color' => array('label' => __('Couleur Secondaire', 'mytheme'), 'default' => '#e74c3c'),
        'content_color' => array('label' => __('Couleur texte', 'mytheme'), 'default' => '#ffffff'),
        'background_color' => array('label' => __('Couleur de Fond', 'mytheme'), 'default' => '#f5f5f5'),
        'surface_color'    => array('label' => __('Couleur Surface', 'mytheme'), 'default' => '#000000')
    );

    foreach ($colors as $key => $color) {
        $wp_customize->add_setting($key, array(
            'default'   => $color['default'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $key, array(
            'label'    => $color['label'],
            'section'  => 'mytheme_colors',
            'settings' => $key,
        )));
    }
}

add_action('customize_register', 'mytheme_customize_variable');

function mytheme_generate_variables()
{
    $sanitize_color = function ($color) {
        if (substr($color, 0, 1) !== '#') {
            $color = '#' . $color;
        }
        return $color;
    };

    $primary_color = $sanitize_color(get_theme_mod('primary_color', '#3498db'));
    $secondary_color = $sanitize_color(get_theme_mod('secondary_color', '#e74c3c'));
    $content_color = $sanitize_color(get_theme_mod('content_color', '#ffffff'));
    $background_color = $sanitize_color(get_theme_mod('background_color', '#f5f5f5'));
    $surface_color = $sanitize_color(get_theme_mod('surface_color', '#ffffff'));

    $css = ":root {
        --primary-color: " . $primary_color . ";
        --secondary-color: " . $secondary_color . ";
        --background-color: " . $background_color . ";
        --surface-color: " . $surface_color . ";
        --content-color: " . $content_color . ";
    }";

    $file = get_template_directory() . '/assets/css/variable.css';
    file_put_contents($file, $css);
}

add_action('customize_save_after', 'mytheme_generate_variables');

function mytheme_enqueue_styles()
{
    wp_enqueue_style('mytheme-variables', get_template_directory_uri() . '/assets/css/variable.css');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');
