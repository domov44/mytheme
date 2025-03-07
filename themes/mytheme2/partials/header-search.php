<li class="navbar__item features">
    <?php $arg = get_search_query(); ?>
    <div class="search__group <?= ($arg) ? 'active' : ''; ?>">
        <div class="action--element">
            <svg class="search-icon" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="13.2472" y1="13.3262" x2="18.833" y2="18.912" stroke="black" stroke-width="2" stroke-linecap="round" />
                <circle cx="8.35254" cy="8.17578" r="6.5" stroke="black" stroke-width="2" />
            </svg>
        </div>
        <div class="submenu action--click">
            <div class="submenu__group">
                <div class="submenu__item">
                    <form role="search" method="get" id="searchform" class="form-search" action="<?php echo home_url('/'); ?>">
                        <div class="fields">
                            <input id="search-fields" type="text" placeholder="Taper un mot-clé..." value="" name="s" data-value="<?= ($arg) ?? ''; ?>" title="" />
                            <button type="reset" class="reset" aria-label="Refresh" onclick="clearInput()">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L16 16" stroke-width="2" stroke-linecap="round" />
                                    <path d="M1 16L16 1" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="wp-block-button is-style-primary-stroke">
                            <button type="submit" class="wp-block-button__link wp-element-button">Rechercher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</li>