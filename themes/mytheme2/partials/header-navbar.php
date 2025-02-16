<!-- Menu navbar -->
<nav id="navbar" class="hidden lg:flex lg:gap-x-12">
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
                <div class="relative flex group">
                    <?php if ($has_children) : ?>
                        <button type="button" class="flex items-center gap-x-1 text-sm font-semibold leading-6 <?= esc_attr($active_class) ?>"
                            aria-expanded="false" data-dropdown-toggle="submenu-<?= esc_attr($item->ID) ?>">
                            <?= esc_html($item->title); ?>
                            <svg class="h-5 w-5 flex-none text-gray-400 transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div id="submenu-<?= esc_attr($item->ID) ?>" class="absolute left-0 top-full z-10 mt-3 w-screen max-w-xs hidden has-surface-background-color shadow-lg ring-1 ring-gray-900/5">
                            <div class="p-4">
                                <?php foreach ($menu_items as $child) :
                                    if ($child->menu_item_parent == $parent_id) :
                                        $child_active = ($child->url == $current_url) ? 'text-blue-600' : 'text-gray-900';
                                ?>
                                        <a href="<?= esc_url($child->url) ?>" class="block px-4 py-2 text-sm font-semibold leading-6 hover:bg-gray-50 <?= esc_attr($child_active) ?>">
                                            <?= esc_html($child->title) ?>
                                        </a>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?= esc_url($item->url) ?>" class="text-sm font-semibold leading-6 <?= esc_attr($active_class) ?>">
                            <?= esc_html($item->title) ?>
                        </a>
                    <?php endif; ?>
                </div>
    <?php
            endif;
        endforeach;
    }
    ?>
</nav>

<!-- Menu features -->
<div class="hidden lg:flex lg:flex-1 lg:justify-end">
    <?php
    if (isset($menu_items_features) && $menu_items_features) :
        foreach ($menu_items_features as $item) :
            $target = $item->target === '_blank' ? ' target="_blank" rel="noopener noreferrer"' : '';
            $active_class = ($item->url == $current_url) ? 'text-blue-600' : 'text-gray-900';
    ?>
            <a class="text-sm font-semibold leading-6  <?= esc_attr($active_class) ?> <?= implode(' ', $item->classes) ?>" href="<?= esc_url($item->url) ?>" aria-label="Voir la page" <?= $target ?>>
                <?= $item->title ?>
            </a>
    <?php
        endforeach;
    endif;
    // get_template_part('partials/header', 'search');
    ?>
</div>