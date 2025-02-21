<?php
$testimonial_text = get_field('temoignage');
$testimonial_author = get_field('testimonial_author');

if ($testimonial_text): ?>
    <blockquote class="testimonials">
        <p>“<?php echo esc_html($testimonial_text); ?>”</p>
        <?php if ($testimonial_author): ?>
            <cite>- <?php echo esc_html($testimonial_author); ?></cite>
        <?php endif; ?>
    </blockquote>
<?php endif; ?>