<?php seo_header();?>

<body id="myBody">
    <?php echo get_skiplinks();?>
    <?php 
        $name_of_menu = 'Hauptnavigation';
    ?>
<header>
    <div class="header_out"><div class="header"><div class="site-logo"><a id="navigation"></a> <div class="desktop_hidden"><button onclick="backNavi()" id="back_navi"><span class="material-icons">arrow_back_ios</span></button></div><?php bs_site_logo();?></div><div class="desktop_navi mobile_hidden"><?php echo haupt_menu($name_of_menu,'d');
        ?></div><div class="nav-frame">
        <?php
            // Site search
            $enable_header_search = get_theme_mod( 'enable_header_search', true );
            if ( true === $enable_header_search ) {
        ?>

        <button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false" aria-label="suche" id="seitensuche"><?php echo bs_get_theme_svg( 'suche','ui','#1F5DA6' ); ?><span class="mobile_hidden label">Suche</span>
        </button>
        <?php
            }
        ?>
        <button class="toggle nav-toggle mobile-nav-toggle desktop_hidden" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle" id="menu" aria-label="menu">              
            <span class="material-icons"></span>
        </button>

        </div>
    <?php
        if ( true === $enable_header_search ) {
            get_template_part( 'template-parts/modal-search' );
        }
    ?>
        </div>
    </div>
    <div class="sub_menu mobile_hidden" id="sub_menu" role="menu">
        <div class="sub_menu_inner">
        <div class="mobile_hidden menu_close"><button aria-label="Menü schliessen" tabindex="0" onclick="closeNavi()"><span class="material-icons">close</span></button></div>
        <?php echo getSubMenu($name_of_menu,'d'); ?>
        </div>
    </div>
<?php 
    if ( true === $enable_header_search ) {
        //get_template_part( 'template-parts/modal-search' );
    }
    get_template_part( 'template-parts/modal-menu' );
    //seo_breadcrumb(); 
?>
</header>

<script type="text/javascript">
( function() {
    var container, menu, links, i, len;
    var navigationContainerId = 'mainnav';
    var menuItemFocusedClass  = 'focus';
 
    container = document.getElementById( navigationContainerId );
    if ( ! container ) {
        return;
    }
 
    menu = container.getElementsByTagName( 'ul' )[0];
 
    if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
        menu.className += ' nav-menu';
    }
 
    // Get all the link elements within the menu.
    links = menu.getElementsByTagName( 'a' );
 
    // Each time a menu link is focused or blurred, toggle focus.
    for ( i = 0, len = links.length; i < len; i++ ) {
        links[i].addEventListener( 'focus', toggleFocus, true );
        links[i].addEventListener( 'blur', toggleFocus, true );
    }
 
    ( function( container ) {
        var touchStartFn, i,
            parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );
 
        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, i;
 
                if ( ! menuItem.classList.contains( menuItemFocusedClass ) ) {
                    e.preventDefault();
                    var menuItemLength = menuItem.parentNode.children.length;
                    for ( i = 0; i < menuItemLength; ++i ) {
                        if ( menuItem === menuItem.parentNode.children[i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[i].classList.remove( menuItemFocusedClass );
                    }
                    menuItem.classList.add( menuItemFocusedClass );
                } else {
                    menuItem.classList.remove( menuItemFocusedClass );
                }
            };
 
            var parentLinkLength = parentLink.length;
            for ( i = 0; i < parentLinkLength; ++i ) {
                parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( container ) );


    /**
     * Sets or removes .focus class on an element.
     */
    function toggleFocus() {
        var self = this;
 
        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {
 
            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'focus' ) ) {
                    self.className = self.className.replace( ' focus', '' );
                } else {
                    self.className += ' focus';
                }
            }
 
            self = self.parentElement;
        }
    }
} )();



</script>   
