<?php
/* 
	Template Name: Test Template
*/	
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Auch das meta-Tag zum Zeichensatz wurde vereinfacht.-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--[if lt IE 9]>
<script language="javascript" type="text/javascript" src="[Pfadangabe]/html5shiv.js"></script>
<![endif]-->     
    <style>

#branding #mainnav ul div:not(.menu_teaser_content) {
    display: block;
    opacity: 1;
    position: absolute;
    background: pink;
    width: 100%;
    left: 0;
}

ul.sub_menu_block {
    display: inline-block;
    vertical-align: top;
}
#branding #mainnav ul ul li{
    display: block;
}

#branding #mainnav ul li:not(.focus):not(:hover) > div:not(.menu_teaser_content) {
    position: absolute;
    left: -999em !important;
    opacity: 0 !important;
}

#branding #mainnav ul li {
  display: inline-block;
  margin: 32px;
}

#branding #mainnav ul li a:focus,
#branding #mainnav ul li a.focus {
    background:#F0F0F0;
    color: #999;
}


    </style>

</head>
<body>
<main>
<header>
<h1>testseite</h1>

<div id="branding">
  <nav id="mainnav">



    <ul class="navbar-nav mr-auto">

<?php 
$name_of_menu = 'Hauptnavigation';
echo haupt_menu_list($name_of_menu,'d');
    ?>  
  </nav>
</div>

  <?php

//echo getSubMenu($name_of_menu,'d');
    ?>

</header>
<main>testtext</main>
</main>
<?php
get_footer();
?>
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
</body>
</html>