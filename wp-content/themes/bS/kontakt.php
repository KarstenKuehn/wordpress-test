<?php
/* 
  Template Name: Kontakt Template
*/
if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
    wpcf7_enqueue_scripts();
}
if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
    wpcf7_enqueue_styles();
}
get_header();
?>
<style>
    .wpcf7{
        margin: auto;
    }
    .wpcf7-response-output {
        display: none;
    }

    .screen-reader-response{
        padding-bottom: 32px;
        margin-bottom: 32px;
        background-color: #f2f4f6;
    }
    .screen-reader-response ul li {
        line-height: 32px;
    }
    .screen-reader-response ul li a{
        color: red;
        font-weight: 400;
        font-size: 24px;
    }
    .screen-reader-response > p {
        font-size: 24px;
    }
    input.wpforms-field-required.wpcf7-not-valid {
        color:red;
        background-color: lightgrey;
        border-bottom: 2px solid red;
    }

    span.wpcf7-not-valid-tip{
        display: block;
        color: red;
        margin-top:3px;
        margin-bottom: 16px;
    }

</style>
<main id="maincontent">
    <div class="main">
        <?php
        //echo '<h1 tabindex="0">'.get_the_title().'</h1>';
        $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
        echo $html;
        ?>
    </div>
</main>
<script>
    /*jslint browser: true */
    /*global jQuery */
    if (jQuery) {
        (function ($) {
            "use strict";
            $(document).ready(function () {
                $('h1.has-large-font-size').attr('tabindex', '0');

                /*$('.screen-reader-response > ul').on('change', function(e) {
                    $(this).trigger('contact-form-error-message');
                });
                $(document).on('contact-form-error-message', function(e) {
                    console.log('document is handling custom event triggered by ' + e.target.id);
                });*/

                $(".screen-reader-response").bind("DOMSubtreeModified", function() {
                    //$(this).attr('tabindex', '0');
                    //$(this).focus();
                    $('.wpcf7 > .screen-reader-response > p[role="status"]').attr('tabindex', '0').focus();
                   // $('.wpcf7 > .screen-reader-response > p[role="status"]').focus();
                    console.log('document.activeElement', document.activeElement);
                    //$("#wpcf7-f6513-o1").focus();
                });


               /*if($('.wpcf7 > .screen-reader-response > ul').children().length > 0) {
                   $('.wpcf7 > .screen-reader-response').attr('tabindex', '0');
                   $('.wpcf7 > .screen-reader-response > p[role="status"]').focus();

                   console.log('screenReaderResponse has messages');
                   console.log('document.activeElement', document.activeElement);
               } else {
                   console.log('screenReaderResponse has not messages');
                   console.log(document.activeElement);
               }*/
                /* Validation Events for changing response CSS classes */
                document.addEventListener( 'wpcf7invalid', function( event ) {
                    $('.wpcf7-response-output').addClass('alert alert-danger');
                    console.log('wpcf7invalid');
                }, false );
                document.addEventListener( 'wpcf7spam', function( event ) {
                    $('.wpcf7-response-output').addClass('alert alert-warning');
                    console.log('wpcf7spam');
                }, false );
                document.addEventListener( 'wpcf7mailfailed', function( event ) {
                    $('.wpcf7-response-output').addClass('alert alert-warning');
                    console.log('wpcf7mailfailed');
                }, false );
                document.addEventListener( 'wpcf7mailsent', function( event ) {
                    $('.wpcf7-response-output').addClass('alert alert-success');
                    console.log('wpcf7mailsent');
                }, false );


            });

        }(jQuery));
    }



</script>
<script type='text/javascript' id='contact-form-7-js-extra'>
    /* <![CDATA[ */
    var wpcf7 = {"api":{"root":"https:\/\/lotterien-spielbanken-bayern.test\/wp-json\/","namespace":"contact-form-7\/v1"}};
    /* ]]> */
</script>
<script type='text/javascript' src='https://lotterien-spielbanken-bayern.test/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.5.2' id='contact-form-7-js'></script>
<?php get_footer(); ?>
<?php #wp_footer(); ?>
