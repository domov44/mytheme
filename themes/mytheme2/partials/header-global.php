<?php
// set logo url
$default_logo = get_theme_file_uri('/assets/medias/default-theme/logo.svg');
$logo_value = get_theme_mod('header_logo', $default_logo);
$logo_url = esc_url($default_logo);

if (is_numeric($logo_value)) {
    $image_data = wp_get_attachment_image_src($logo_value, 'full');
    if ($image_data) {
        $logo_url = esc_url($image_data[0]);
    }
} else {
    $logo_url = esc_url($logo_value);
}

$site_name = esc_attr(get_bloginfo('name'));

set_query_var('logo_url', $logo_url);
set_query_var('site_name', $site_name);


// set menu items menu global
$locations = get_nav_menu_locations();
$menu_location = 'header-navbar';

if (isset($locations[$menu_location])) {
    $menu_id = $locations[$menu_location];
    $menu_items = wp_get_nav_menu_items($menu_id);
} else {
    $menu_items = null;
}
set_query_var('menu_items', $menu_items);

// set menu items menu features
$menu_location_features = 'header-features';

if (isset($locations[$menu_location_features])) {
    $menu_id = $locations[$menu_location_features];
    $menu_items_features = wp_get_nav_menu_items($menu_id);
} else {
    $menu_items_features = null;
}
set_query_var('menu_items_features', $menu_items_features);


// set current url page
$current_url = trailingslashit(home_url(add_query_arg(array(), $wp->request)));
set_query_var('current_url', $current_url);
?>

<!-- Header -->
<header class="header w-full">
    <div class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <!-- Logo menu -->
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only"><?php echo $site_name ?></span>
                <img class="h-8 w-auto" src="<?php echo $logo_url; ?>" alt="<?php echo $site_name ?> Logo">
            </a>
        </div>
        <!-- Burger icon -->
        <div class="flex lg:hidden">
            <button type="button" id="mobile-menu-button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <!-- Menus -->
        <?php get_template_part('partials/header', 'navbar'); ?>
    </div>
    <!-- Menus mobile -->
    <?php get_template_part('partials/header', 'navbar-mobile'); ?>
</header>