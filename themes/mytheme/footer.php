<footer class="flex justify-center py-10">
    <?php wp_footer(); ?>
    <div class="container flex justify-between">
        <div class="flex-[0.5]">
            <?php wp_nav_menu(['theme_location' => 'menu footer']) ?>
        </div>
        <div class="footer-widgets flex flex-auto">
            <?php
            $display_columns = false;
            for ($i = 1; $i <= 3; $i++) :
                if (is_active_sidebar("footer-widget-$i")) :
                    $display_columns = true;
            ?>
                    <div class="footer-column flex-auto">
                        <?php dynamic_sidebar("footer-widget-$i"); ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if (!$display_columns) : ?>
                <style>
                    .footer-widgets {
                        display: none;
                    }
                </style>
            <?php endif; ?>
        </div>

    </div>
</footer>
</body>

</html>