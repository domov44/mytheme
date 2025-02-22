<?php
function mytheme_register_acf_block_types()
{
    register_block_type(__DIR__ . '/testimonials');
    register_block_type(__DIR__ . '/hero');
}

add_action('init', 'mytheme_register_acf_block_types');