<?php
 if (is_active_sidebar('footer-widget')) : ?>
    <footer class="footer-widgets has-surface-background-color">
        <?php dynamic_sidebar('footer-widget'); ?>
    </footer>
<?php endif; ?>
