<!-- Mobile menu -->
<div id="mobile-menu" class="lg:hidden hidden" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-10"></div>
    <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto has-surface-background-color px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only"><?php echo $site_name ?></span>
                <img class="h-8 w-auto" src="<?php echo $logo_url; ?>" alt="<?php echo $site_name ?> Logo">
            </a>
            <button id="close-menu-button" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Fermer le menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">

                <!-- Mobile menu navbar -->
                <div class="space-y-2 py-6">
                    <?php
                    if (isset($menu_items) && $menu_items) {
                        foreach ($menu_items as $item) :
                            if ($item->menu_item_parent == 0) :
                                $parent_id = $item->ID;
                                $has_children = false;

                                foreach ($menu_items as $child) {
                                    if ($child->menu_item_parent == $parent_id) {
                                        $has_children = true;
                                        break;
                                    }
                                }

                                $active_class = ($item->url == $current_url) ? 'text-blue-600' : 'text-gray-900';
                    ?>

                                <?php if ($has_children) : ?>
                                    <div class="-mx-3">
                                        <button id="submenu-button-<?= esc_attr($item->ID) ?>"
                                            type="button"
                                            class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 <?= esc_attr($active_class) ?>"
                                            aria-controls="submenu-mobile-<?= esc_attr($item->ID) ?>"
                                            aria-expanded="false"
                                            data-submenu-button>
                                            <?= esc_html($item->title); ?>
                                            <svg class="h-5 w-5 flex-none transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div id="submenu-mobile-<?= esc_attr($item->ID) ?>" class="mt-2 space-y-2 hidden">
                                            <?php foreach ($menu_items as $child) :
                                                if ($child->menu_item_parent == $parent_id) :
                                                    $child_active = ($child->url == $current_url) ? 'text-blue-600' : 'text-gray-900';
                                            ?>
                                                    <a href="<?= esc_url($child->url) ?>" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50 <?= esc_attr($child_active) ?>">
                                                        <?= esc_html($child->title) ?>
                                                    </a>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>
                                        </div>

                                    </div>
                                <?php else : ?>
                                    <a href="<?= esc_url($item->url) ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 <?= esc_attr($active_class) ?>">
                                        <?= esc_html($item->title) ?>
                                    </a>
                                <?php endif; ?>
                    <?php
                            endif;
                        endforeach;
                    }
                    ?>
                </div>
                <!-- / Mobile menu navbar -->

                <!-- Mobile menu features -->
                <div class="py-6">
                    <?php
                    if (isset($menu_items_features) && $menu_items_features) :
                        foreach ($menu_items_features as $item) :
                            $target = $item->target === '_blank' ? ' target="_blank" rel="noopener noreferrer"' : '';
                    ?>
                            <a class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 <?= implode(' ', $item->classes) ?>" href="<?= esc_url($item->url) ?>" aria-label="Voir la page" <?= $target ?>>
                                <?= $item->title ?>
                            </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <!-- / Mobile menu features -->

                <?php get_template_part('partials/header', 'search'); ?>
            </div>
        </div>
    </div>
</div>
<!-- / Mobile menu -->