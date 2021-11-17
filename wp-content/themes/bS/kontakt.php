<?php
/* 
  Template Name: Kontakt Template
*/
if (function_exists('wpcf7_enqueue_scripts')) {
   #wpcf7_enqueue_scripts();
}
if (function_exists('wpcf7_enqueue_styles')) {
   #wpcf7_enqueue_styles();
}
get_header();
?>
<style>
    .wpcf7-response-output {}

    .screen-reader-response {
        padding-bottom: 32px;
        margin-bottom: 32px;
        background-color: #f2f4f6;
    }

    .screen-reader-response ul {
        color: red;
        list-style: none;
    }

    .screen-reader-response ul li {
        padding: 2px 0 5px 0;
        font-weight: 400;
        font-size: 24px;
        text-decoration: underline;
    }

    .screen-reader-response ul li a {
        color: red;
        font-weight: 400;
        font-size: 24px;
        text-decoration: underline;
    }

    .screen-reader-response > p {
        font-size: 24px;
        line-height: 32px;
    }

    .wpcf7-form.invalid > .kontakt-form > .form-field-label {}

    input.wpforms-field-required.wpcf7-not-valid {
        border-bottom: 2px solid red;
    }

    textarea.wpforms-field-required.wpcf7-not-valid {
        border-bottom: 2px solid red;
    }

    span.wpcf7-not-valid-tip {
        display: block;
        color: red;
        margin-top: 3px;
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
    if (jQuery) {
        (function ($) {
            "use strict";
            $(document).ready(function () {
                /**
                 * see https://contactform7.com/dom-events/
                 */
                /**
                 * Focus zuerst auf Überschrift
                 */
                document.querySelector('.has-large-font-size')
                    .scrollIntoView();
                $('.has-large-font-size').attr('tabindex', '0');

                var wpcf7Elm = document.querySelector('.wpcf7');

                $('.wpcf7 > .screen-reader-response > ul').one("DOMSubtreeModified", function () {
                    $(this).find('a').attr('tabindex', '0');
                });

                $(wpcf7Elm).on("wpcf7invalid", function () {

                    document.querySelector('.wpcf7 > .screen-reader-response')
                        .scrollIntoView();

                    $(wpcf7Elm).find('.screen-reader-response > p[role="status"]')
                        .attr('tabindex', '0')
                        .focus();

                    $('#contact-form-submit').blur();

                    $(wpcf7Elm).find('.wpcf7-response-output').remove();
                    console.log('wpcf7invalid');
                });


                $(wpcf7Elm).on("wpcf7spam", function () {

                    document.querySelector('.wpcf7 > .screen-reader-response')
                        .scrollIntoView();

                    $('.wpcf7 > .screen-reader-response > p[role="status"]')
                        .attr('tabindex', '0')
                        .focus();

                    $(wpcf7Elm).find('.wpcf7-response-output').remove();

                    console.log('wpcf7spam');

                });

                $(wpcf7Elm).on("wpcf7mailfailed", function () {

                    document.querySelector('.wpcf7 > .screen-reader-response')
                        .scrollIntoView();

                    $('.wpcf7 > .screen-reader-response > p[role="status"]')
                        .attr('tabindex', '0')
                        .focus();

                    $(wpcf7Elm).find('.wpcf7-response-output').remove();

                    console.log('wpcf7mailfailed');
                });

                $(wpcf7Elm).on("wpcf7grecaptchaexecuted", function (event) {

                    $('.wpcf7 > #g-recaptcha-response').val(event.detail.token);

                    console.log('wpcf7grecaptchaexecuted', event.detail.token);
                });

                $(wpcf7Elm).on("wpcf7mailsent", function () {

                    /**
                     * Section Content ersetzen
                     * @type {*|jQuery|HTMLElement}
                     */
                    var section = $(".wp-block-bitv-section.content_section.bitv.gray");

                    document.querySelector('.has-large-font-size')
                        .scrollIntoView();

                    /**
                     * Überschrift neu setzen
                     */
                    $(section[0])
                        .find(".has-large-font-size")
                        .text("Vielen Dank, dass Sie uns kontaktiert haben!")
                        //.attr('tabindex', '0')
                        .focus();

                    $(section[0])
                        .find("p.modul_content")
                        .replaceWith(`
                        <div role="status" aria-live="polite" aria-atomic="true">
                            <p>Wir werden Ihre Anfrage an den Fachbereich weiterleiten und uns schnellstmöglich bei Ihnen melden.</p>
                            <p>Mit freundlichen Grüßen</p>
                            <p>Ihr Team der Staatlichen Lotterie- und Spielbankverwaltung</p>
                        </div>
                        `);
                    /**
                     * letzte Section löschen
                     */
                    $(section[1]).remove();

                    /**
                     * Formular Container löschen
                     */
                    $(this).remove();


                });

            });

        }(jQuery));
    }

</script>
<script type='text/javascript' id='contact-form-7-js-extra'>
    /* <![CDATA[ */
    var wpcf7 = {
        "api": {
            "root": "https:\/\/lotterien-spielbanken-bayern.test\/wp-json\/",
            "namespace": "contact-form-7\/v1"
        }
    };
    /* ]]> */

</script>
<script type='text/javascript'
        src='https://lotterien-spielbanken-bayern.test/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.5.2'
        id='contact-form-7-js'></script>
<?php echo do_shortcode("[grecaptcha_footerscripts]"); ?>
<?php get_footer(); ?>
