<?php seo_header(); ?>

<body id="myBody">
<?php echo get_skiplinks(); ?>
<header class="border-bottom-grey">
    <nav class="nav-container" id="navigation">
        <div class="nav-container__logo">
            <div class="desktop_hidden">
                <button id="back_navi">
                    <span class="material-icons">arrow_back_ios</span>
                </button>
            </div>
            <?php bs_site_logo(); ?>
        </div>
        <button class="toggle nav-toggle mobile-nav-toggle desktop_hidden"
                aria-expanded="false"
                aria-haspopup="menu"
                aria-label="menu-btn"
                id="menu-btn">
            <span class="material-icons"></span>
        </button>
        <?php if (has_nav_menu('top-menu')): bs_main_nav_walker(); endif; ?>

        <div class="nav-frame">
            <?php
            // Site search
            $enable_header_search = get_theme_mod('enable_header_search', true);
            if (true === $enable_header_search) {
                ?>
                <button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal"
                        data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field"
                        aria-expanded="false" aria-label="suche" id="seitensuche">
                    <?php echo bs_get_theme_svg('suche', 'ui', '#1F5DA6'); ?><span
                            class="mobile_hidden label">Suche</span>
                </button>
            <?php } ?>

        </div>
    </nav>

    <?php
    if (true === $enable_header_search): get_template_part('template-parts/modal-search'); endif;
    ?>
</header>
