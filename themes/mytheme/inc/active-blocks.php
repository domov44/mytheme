<?php 
function custom_allowed_blocks($allowed_blocks, $editor_context) {
    return [
        'custom/hero',
    ];
}
add_filter('allowed_block_types_all', 'custom_allowed_blocks', 10, 2);
