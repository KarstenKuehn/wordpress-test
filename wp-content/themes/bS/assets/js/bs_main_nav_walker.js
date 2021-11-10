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
            //$('#navigation').accessibleMegaMenu();
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
            // hack so that the megamenu doesn't show flash of css animation after the page loads.
            setTimeout(function () {
                $('body').removeClass('init');
            }, 500);
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

        function mobileMenuOpen()
        {
            $("#navigation > ul.nav-container__main-nav").css({'height': "calc(100vh - 73px)"});
            $("#maincontent").addClass('overlay');
            $("#menu-btn").addClass('active');
        }

        function mobileMenuClose()
        {
            $("#navigation > ul.nav-container__main-nav").css({'height': "0"});
            $("#maincontent").removeClass('overlay');
            $("#menu-btn").removeClass('active');
            $("#back_navi").css({'display': 'none'});
        }

        function checkSize(){

            /**
             * mobile version
             */
            if ($(".nav-container__main-nav").css("flex-direction") === "column" ) {
                /**
                 * Submenu Boxen vertauschen
                 */
                $("div.submenu-container").each(function () {

                    var listContainer = $(this).find(".submenu-row > .submenu-list-container");
                    var teaserContainer = $(this).find(".submenu-row > .submenu-teaser-container");

                    listContainer.insertAfter(teaserContainer);
                    $(this).find(".submenu-row.first.sub-nav-group").remove();

                });

                $("#back_navi").bind('click', function (e) {
                    $("#back_navi").css({'display': 'none'});
                });

                $("#top-menu > li.nav-container__main-nav-item")
                    .each(function () {})
                    .bind('click', function (e) {
                        $("#back_navi").css({'display': 'block'});
                    });


                $("#menu-btn").bind("click keydown keypress", function (e) {

                    if(e.type === "keydown") {
                        if((e.keyCode === 9 || e.keyCode === 40) &&
                            e.shiftKey === false) {

                            mobileMenuOpen();

                        } else if(
                            (e.keyCode === 9 && e.shiftKey === true) ||
                            e.keyCode === 38
                        ) {

                            mobileMenuClose();

                        }

                    }
                    if(e.type === "click") {

                        if ($("#menu-btn").hasClass('active')) {

                            mobileMenuClose()

                        } else {

                            mobileMenuOpen()

                        }
                    }

                });

            /**
             * Desktop version
             * } else if ($(".nav-container__main-nav").css("flex-direction") === "row" ){
             */
            } else {

                /**
                 * if clicked outside from the navigation, then menu close
                 */
                $(document).click(function (e) {
                    if($('.nav-container__main-nav > li.nav-item')&&!$(e.target).closest('.nav-container__main-nav > li.nav-item .submenu-container').length){
                        closeMenu();
                    }
                });

                /**
                 * TAB = tabindex=-1
                 */
                $(document).on('keyup', '.nav-container__main-nav', function(e) {

                    if(e.keyCode === 9) {

                        $(this).find('.main-nav_submenu.sub-nav > .submenu-container a').each(function (index, value) {
                            $(value).attr('tabindex', '-1');
                        });
                        $(this).find('.main-nav_submenu.sub-nav > .submenu-container button').each(function (index, value) {
                            $(value).attr('tabindex', '-1');
                        });

                    } else {

                        $(this).find('.main-nav_submenu.sub-nav > .submenu-container a').each(function (index, value) {
                            $(value).removeAttr('tabindex');
                        });
                        $(this).find('.main-nav_submenu.sub-nav > .submenu-container button').each(function (index, value) {
                            $(value).removeAttr('tabindex');
                        });

                    }

                });

                /**
                 * set CloseButton
                 */
                $('.main-nav_submenu.sub-nav').each(function() {
                    var submenuEl = this;
                    $(submenuEl).find('button.submenu__close-button', function () {
                        var btnEl = this;
                    }).bind( "click", function(e) {
                        closeMenu();

                    });
                });

                $('.main-nav_submenu.sub-nav').each(function() {
                    var submenuEl = this;
                    $(submenuEl).find('button.submenu__close-button', function () {
                        var btnEl = this;
                    }).bind( "keydown keyup", function(e) {
                        //
                        if(e.type === "keydown" && e.keyCode !== 9) {
                            closeMenu();
                        }

                    });
                });

                $(document).on('keydown', '.nav-container__main-nav > li.nav-item:last > a', function(e) {
                    if(e.keyCode === 39) {
                        $('#seitensuche').focus();
                    }
                });
                $(document).on('keydown', '#seitensuche', function(e) {
                    if(e.keyCode === 37) {
                        $('.nav-container__main-nav > li.nav-item:last > a').focus();
                    }
                    if(e.keyCode === 37) {
                        $('#seitensuche').next().focus();
                    }
                });
                $(document).on('keydown', '.nav-container__main-nav > li.nav-item:first > a', function(e) {
                    if(e.keyCode === 37) {
                        $('.custom-logo-link').focus();
                    }
                });
                $(document).on('keydown', '.custom-logo-link', function(e) {
                    if(e.keyCode === 39) {
                        $('.nav-container__main-nav > li.nav-item:first > a').focus();
                    }
                });

                $('.main-nav_submenu.sub-nav').each(function() {
                    var submenuEl = this;
                    var submenuParents = $(this).parents();

                    var navItem = $(submenuParents[0]).find(' > a');
                    var lastNavItem = $('.nav-container__main-nav > li.nav-item:last').find(' > a');

                    $(submenuEl)
                        .find('a', 'button')
                        .bind( "keyup", function(e) {
                            var link = this;

                            if(!$(navItem).hasClass('active')) {
                                $(navItem).addClass('active');
                                $(navItem).attr('aria-expanded', true);

                                $(submenuEl).addClass('active');
                                $(submenuEl).attr('aria-hidden', false);
                            }
                        });
                });

            }
        }

    }(jQuery));
}
