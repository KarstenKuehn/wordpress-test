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

        function checkSize(){

            // is mobile
            if ($(".nav-container__main-nav").css("flex-direction") === "column" ) {
                console.log('mobile styles');
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

            } else if ($(".nav-container__main-nav").css("flex-direction") === "row" ){

                console.log('desktop styles');

                $( ".nav-container__main-nav li.nav-item" )
                .each( function( index, $el ) {
                   // console.log('each->elem', $el);
                })
                .find('button.submenu__close-button', function (e) {
                    var elem = $(this);
                    console.log('submenu__close-button', elem);
                })
                .bind( "click keydown keypress", function(e) {
                    let submenuItem = e.currentTarget.offsetParent;
                    $(submenuItem)
                        .removeClass('active')
                        .attr('aria-hidden', true);

                    let mainmenuItem = submenuItem.parentElement;
                    $(mainmenuItem)
                        .find('a.active')
                        .removeClass('active')
                        .attr('aria-expanded', false)
                        .addClass('focus')
                        .focus();
                });

            }
        }

        function testing()
        {
            $( ".nav-container__main-nav li.nav-item a.active").bind('click', function(e) {
                console.log('click: ', e);
            });
        }

    }(jQuery));
}


