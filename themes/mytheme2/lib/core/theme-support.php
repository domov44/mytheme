<?php
add_theme_support('title-tag');
add_theme_support('align-wide');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support('widgets-block-editor');

function enable_excerpts_for_pages() {
    add_post_type_support('page', 'excerpt');
}
add_action('init', 'enable_excerpts_for_pages');


// Svg support format
//_________
function custom_mtypes($m)
{
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter('upload_mimes', 'custom_mtypes');


// Header logo
//_________
function diwp_theme_customizer_options($wp_customize)
{

	$wp_customize->add_setting('header_logo', array(
		'default' => get_theme_file_uri('/assets/medias/default-theme/logo.svg'),
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'diwp_logo_control', array(
		'label' => 'Header Logo',
		'priority' => 20,
		'section' => 'title_tagline',
		'settings' => 'header_logo',
		'button_labels' => array(
			'select' => 'Select Logo',
			'remove' => 'Remove Logo',
			'change' => 'Change Logo',
		)
	)));
}
add_action('customize_register', 'diwp_theme_customizer_options');


// Register widgets
//_________
function mytheme_register_footer_widget() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'mytheme'),
        'id'            => 'footer-widget',
        'description'   => __('Widgets added here will appear in the footer.', 'mytheme'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'mytheme_register_footer_widget');


// Register menus
//_________
function mytheme_register_nav_menu()
{
  register_nav_menus(array(
    'header-features' => __('Menu features', 'text_domain'),
    'header-navbar'  => __('Menu navbar', 'text_domain'),
    'footer'  => __('Menu Pied de Page', 'text_domain'),
  ));
}
add_action('after_setup_theme', 'mytheme_register_nav_menu', 0);