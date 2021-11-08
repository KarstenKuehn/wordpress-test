/*jslint browser: true */
/*global jQuery */
if (jQuery) {
    (function ($) {
        "use strict";
        $(document).ready(function () {
            /**
             * check device width
             */
            checkSize();

            $(window).resize(checkSize);

            // initialize the megamenu
            $('#navigation').accessibleMegaMenu();

            // hack so that the megamenu doesn't show flash of css animation after the page loads.
            setTimeout(function () {
                $('body').removeClass('init');
            }, 500);
        });

        <!-- initialize a selector as an accessibleMegaMenu -->
        $("#navigation").accessibleMegaMenu({
            /* prefix for generated unique id attributes, which are required
           to indicate aria-owns, aria-controls and aria-labelledby */
            uuidPrefix: "accessible-megamenu",

            /* css class used to define the megamenu styling */
            menuClass: "nav-menu",

            /* css class for a top-level navigation item in the megamenu */
            topNavItemClass: "nav-item",

            /* css class for a megamenu panel */
            panelClass: "sub-nav",

            /* css class for a group of items within a megamenu panel */
            panelGroupClass: "sub-nav-group",

            /* css class for the hover state */
            hoverClass: "hover",

            /* css class for the focus state */
            focusClass: "focus",

            /* css class for the open state */
            openClass: "active"
        });

        function closeMenu() {
            $( ".nav-container__main-nav li.nav-item > .main-nav_submenu" )
                .each( function( index, $el ) {
                    if($($el).hasClass('active')) {
                        $($el).removeClass('active');
                        $($el).attr('aria-hidden', true);
                    }
                });

            $( ".nav-container__main-nav li.nav-item > a" )
                .each( function( index, $el ) {
                    if($($el).hasClass('active')) {
                        $($el).removeClass('active');
                        $($el).attr('aria-expanded', false);
                        $($el).focus();
                    }
                });
        }

        function checkSize(){

            /**
             * if clicked outside from the navigation, then menu close
             */
            $(document).click(function (e) {
                if($('.nav-container__main-nav > li.nav-item')&&!$(e.target).closest('.nav-container__main-nav > li.nav-item .submenu-container').length){
                    closeMenu();
                }
            });

            /**
             * mobile version
             */
            if ($(".nav-container__main-nav").css("flex-direction") === "column" ) {
                /**
                 * Submenu Boxen vertauschen
                 */
                $(".nav-container__main-nav > li.nav-item > .main-nav_submenu > .submenu-container").each(function () {

                    var $submenuContainer = $(this);
                    var listContainer = $(this).find(".submenu-row .submenu-list-container");
                    var teaserContainer = $(this).find(".submenu-row .submenu-teaser-container");

                    listContainer.insertAfter(teaserContainer);
                    $(this).find(".submenu-row.first").remove();

                });

                $("#back_navi").bind('click', function (e) {
                    $("#back_navi").css({'display': 'none'});
                });

                $(".nav-container__main-nav li.nav-item a").bind('click', function (e) {
                    $("#back_navi").css({'display': 'block'});
                })

                $("#menu-btn").bind("click", function () {
                    if ($("#menu-btn").hasClass('active')) {

                        $("#navigation > ul.nav-container__main-nav").css({'height': "0"});
                        $("#maincontent").removeClass('overlay');
                        $("#menu-btn").removeClass('active');
                        $("#back_navi").css({'display': 'none'});

                    } else {

                        $("#navigation > ul.nav-container__main-nav").css({'height': "calc(100vh - 73px)"});
                        $("#maincontent").addClass('overlay');
                        $("#menu-btn").addClass('active');

                    }
                });

            /**
             * Desktop version
             */
            } else if ($(".nav-container__main-nav").css("flex-direction") === "row" ){

                $( ".nav-container__main-nav li.nav-item" )
                .each( function( index, $el ) {})
                .find('button.submenu__close-button', function (e) {
                    var elem = $(this);
                })
                .bind( "click keydown keypress", function(e) {
                    closeMenu();
                });

            }
        }

    }(jQuery));
}
