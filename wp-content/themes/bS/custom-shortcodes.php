<?php

add_shortcode('grecaptcha_footerscripts', 'wpcf7_grecaptcha_footerscripts');
function wpcf7_grecaptcha_footerscripts()
{

    $service = WPCF7_RECAPTCHA::get_instance();
    $sitekey = $service->get_sitekey();
    $secret = $service->get_secret($sitekey);

    if ($sitekey && $secret) {

        return <<<EOF
        <script type='text/javascript' src='https://www.google.com/recaptcha/api.js?render=$sitekey&#038;ver=3.0' id='google-recaptcha-js'></script>
        <script type='text/javascript' src='https://lotterien-spielbanken-bayern.test/wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.13.7' id='regenerator-runtime-js'></script>
        <script type='text/javascript' src='https://lotterien-spielbanken-bayern.test/wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=3.15.0' id='wp-polyfill-js'></script>
        <script type='text/javascript' id='wpcf7-recaptcha-js-extra'>
        /* <![CDATA[ */
        var wpcf7_recaptcha = {"sitekey":"$sitekey","actions":{"homepage":"homepage","contactform":"contactform"}};
        /* ]]> */
        </script>
        <script type='text/javascript' src='https://lotterien-spielbanken-bayern.test/wp-content/plugins/contact-form-7/modules/recaptcha/index.js?ver=5.5.2' id='wpcf7-recaptcha-js'></script>
        <script type='text/javascript' src='https://lotterien-spielbanken-bayern.test/wp-includes/js/wp-embed.min.js?ver=5.8' id='wp-embed-js'></script>      
EOF;

    }
}
