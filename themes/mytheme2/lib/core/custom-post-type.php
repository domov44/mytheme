<?php

function mytheme_add_role_meta_box()
{
    add_meta_box(
        'mytheme_role_meta',
        'Rôle',
        'mytheme_role_meta_callback',
        'works',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'mytheme_add_role_meta_box');

function mytheme_role_meta_callback($post)
{
    $role = get_post_meta($post->ID, '_work_role', true);
    echo '<input type="text" name="work_role" value="' . esc_attr($role) . '" style="width:100%;" placeholder="Ex: Directeur artistique" />';
}

function mytheme_save_role_meta($post_id)
{
    if (isset($_POST['work_role'])) {
        update_post_meta($post_id, '_work_role', sanitize_text_field($_POST['work_role']));
    }
}
add_action('save_post', 'mytheme_save_role_meta');



function mytheme_custom_post_type()
{

    $labels = array(
        'name'                => _x('Works', 'Post Type General Name'),
        'singular_name'       => _x('Work', 'Post Type Singular Name'),

        'menu_name'           => __('Works'),
        'all_items'           => __('All works'),
        'view_item'           => __('View work'),
        'add_new_item'        => __('Add new work'),
        'add_new'             => __('Add'),
        'edit_item'           => __('Edit the work'),
        'update_item'         => __('Update the work'),
        'search_items'        => __('Search some work'),
        'not_found'           => __('Not found'),
        'not_found_in_trash'  => __('Not found in trash'),
    );


    $args = array(
        'label'               => __('Work name'),
        'menu_icon'           => 'dashicons-video-alt2',
        'description'         => __('Work description'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'revisions',),

        // 'show_in_rest' => true,
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,

    );

    register_post_type('works', $args);
}

add_action('init', 'mytheme_custom_post_type', 0);


add_action('init', 'mytheme_add_taxonomies', 0);

function mytheme_add_taxonomies()
{

    $labels_year = array(
        'name'                          => _x('Years', 'taxonomy general name'),
        'singular_name'                 => _x('Year', 'taxonomy singular name'),
        'search_items'                  => __('Search year'),
        'all_items'                        => __('Alls years'),
        'edit_item'                     => __('Edit year'),
        'update_item'                   => __('Update year'),
        'add_new_item'                     => __('Add a new year'),
        'new_item_name'                 => __('New year value'),
        'separate_items_with_commas'    => __('Séparer les réalisateurs avec une virgule'),
        'menu_name'         => __('Year', 'mytheme'),
    );

    $args_year = array(
        'hierarchical'      => true,
        'labels'            => $labels_year,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'years'),
    );

    register_taxonomy('years', 'works', $args_year);
}
