<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="flex justify-center text-white p-4">
        <div class="flex justify-between container">
            <?php if (has_custom_logo()) : ?>
                <div class="site-logo">
                    <?php the_custom_logo(); ?>
                </div>
            <?php else : ?>
                <div class="site-title text-2xl font-semibold">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-yellow-500">
                        <?php bloginfo('name'); ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php
            wp_nav_menu([
                'theme_location' => 'main',
                'container' => 'nav',
                'container_class' => 'flex gap-6',
                'menu_class' => 'flex gap-6 text-lg',
                'link_class' => 'hover:text-yellow-500 transition-colors',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ]);
            ?>

            <button id="search-toggle" class="cursor-pointer text-white text-2xl focus:outline-none hover:text-yellow-500 transition">
                Rechercher
            </button>
        </div>
        </div>
    </header>

    <div id="search-container" class="hidden fixed inset-0 bg-white bg-opacity-80 flex items-center justify-center z-50">
        <form role="search" method="get" class="flex" action="<?php echo home_url('/'); ?>">
            <input type="search" name="s" placeholder="Rechercher..."
                class="w-80 px-4 py-2 rounded-l border-none focus:ring-2 focus:ring-yellow-500 outline-none"
                required>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-r hover:bg-yellow-600 transition">
                Rechercher
            </button>
        </form>

        <button id="search-close" class="absolute top-4 right-4 text-white text-3xl hover:text-red-500 transition">
            ✖
        </button>
    </div>


    <?php wp_body_open(); ?>