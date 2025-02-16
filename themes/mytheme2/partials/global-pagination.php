<?php

$prev_text = '<span aria-hidden="true">&laquo;</span>';
$next_text = '<span aria-hidden="true">&raquo;</span>';

$posts_pagination = get_the_posts_pagination(
    array(
        'mid_size'  => 1,
        'prev_text' => $prev_text,
        'next_text' => $next_text,
    )
);

if (strpos($posts_pagination, 'prev page-numbers') === false) {
    $posts_pagination = str_replace(
        '<div class="nav-links">',
        '<div class="nav-links"><span class="prev page-numbers placeholder hidden text-gray-400 cursor-not-allowed" aria-hidden="true">' . $prev_text . '</span>',
        $posts_pagination
    );
}

if (strpos($posts_pagination, 'next page-numbers') === false) {
    $posts_pagination = str_replace(
        '</div>',
        '<span class="next page-numbers placeholder hidden text-gray-400 cursor-not-allowed" aria-hidden="true">' . $next_text . '</span></div>',
        $posts_pagination
    );
}

if ($posts_pagination) { ?>
    <div class="pagination flex justify-center space-x-2 mt-4">
        <?php echo str_replace(
            ["page-numbers", "prev", "next", "current"],
            ["page-numbers text-md px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 transition", "prev px-3 py-1", "next px-3 py-1", "current bg-blue-600 text-white border-blue-500"],
            $posts_pagination
        ); ?>
    </div>
    <?php
}
