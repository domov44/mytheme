<div class="container max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between gap-6">
    <!-- Menu -->
    <div class="w-full md:w-1/3">
        <?php wp_nav_menu(['theme_location' => 'menu footer']) ?>
    </div>

    <!-- Widgets -->
    <?php
    $display_columns = false;
    ob_start();
    ?>
    <div class="footer-widgets w-full md:flex md:flex-row flex-wrap gap-4">
        <?php for ($i = 1; $i <= 3; $i++) :
            if (is_active_sidebar("footer-widget-$i")) :
                $display_columns = true;
        ?>
                <div class="footer-column flex-1 min-w-[200px]">
                    <?php dynamic_sidebar("footer-widget-$i"); ?>
                </div>
        <?php endif;
        endfor; ?>
    </div>
    <?php
    $widget_content = ob_get_clean();
    if ($display_columns) {
        echo $widget_content;
    }
    ?>
</div>