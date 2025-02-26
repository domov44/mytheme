<?php
$hero_heading = get_field('heading');
$hero_subtitle = get_field('subtitle');
$hero_content = get_field('content');
$degrade = get_field('degrade');
$image = get_field('image');

$first_button = get_field('first_button');
$second_button = get_field('second_button');

if ($hero_heading || $hero_subtitle || $hero_content || $first_button || $second_button): ?>
    <section class="hero <?php echo $degrade ? 'has-gradient' : ''; ?>">
        <div class="hero-content">
            <?php if ($hero_subtitle): ?>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium has-surface-background-color has-heading-color">
                    <?php echo esc_html($hero_subtitle); ?>
                </span>
            <?php endif; ?>

            <?php if ($hero_heading): ?>
                <h1><?php echo esc_html($hero_heading); ?></h1>
            <?php endif; ?>

            <?php if ($hero_content): ?>
                <div class="content_wrapper">
                    <p><?php echo esc_html($hero_content); ?></p>
                </div>
            <?php endif; ?>

            <div class="hero-buttons">
                <?php if ($first_button): ?>
                    <a href="<?php echo esc_url($first_button['url']); ?>" class="btn--primary" target="<?php echo esc_attr($first_button['target']); ?>">
                        <?php echo esc_html($first_button['title']); ?>
                    </a>
                <?php endif; ?>

                <?php if ($second_button): ?>
                    <a href="<?php echo esc_url($second_button['url']); ?>" class="btn--secondary" target="<?php echo esc_attr($second_button['target']); ?>">
                        <?php echo esc_html($second_button['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($degrade): ?>
            <div class='overlay'></div>
        <?php endif; ?>

        <?php if ($image): ?>
            <div class="demo-img">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>