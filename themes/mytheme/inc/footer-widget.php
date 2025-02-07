<?php
function custom_footer_widgets_init() {
    for ($i = 1; $i <= 3; $i++) {
        register_sidebar(array(
            'name'          => "Footer Column $i",
            'id'            => "footer-widget-$i",
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
    }
}
add_action('widgets_init', 'custom_footer_widgets_init');
