<?php 
function enqueue_tailwind_cdn() {
    wp_enqueue_script('tailwindcss', 'https://unpkg.com/@tailwindcss/browser@4', array(), null, false);
}
add_action('wp_enqueue_scripts', 'enqueue_tailwind_cdn');