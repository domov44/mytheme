<?php
function my_custom_blocks()
{
    wp_register_script(
        'hero-block',
        get_template_directory_uri() . '/blocks/hero/index.js',
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components'),
        filemtime(get_template_directory() . '/blocks/hero/index.js')
    );

    wp_register_style(
        'hero-block-style',
        get_template_directory_uri() . '/blocks/hero/style.css'
    );

    wp_register_style(
        'hero-block-editor',
        get_template_directory_uri() . '/blocks/hero/editor.css',
        get_template_directory_uri() . '/assets/css/style.css',
        get_template_directory_uri() . '/assets/css/reset.css'
    );

    register_block_type('custom/hero', array(
        'editor_script' => 'hero-block',
        'style'         => 'hero-block-style',
        'editor_style'  => 'hero-block-editor',
    ));
}
add_action('init', 'my_custom_blocks');
