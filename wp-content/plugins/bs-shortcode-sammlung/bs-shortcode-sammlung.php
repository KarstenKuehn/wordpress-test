<?php
/*
Plugin Name: Shortcode-Sammlung
Description: Nützliche Shortcodes für meine Website
Author: BS-Lottobayern
*/

// auch in Text-Widgets verwenden
add_filter( 'widget_text', 'do_shortcode' );

// Mein erster Shortcode: [meinshortcode]
function meinshortcode_function(){
return "<h2>aaa</h2><p><b>Hey, das ist mein Shortcode_xxxxxxxxxxxxxxxxxxx!</b></p>";
}
//add_shortcode('meinshortcode', 'meinshortcode_function' );

function register_shortcodes(){
   add_shortcode('meinshortcode', 'meinshortcode_function' );
}
add_action( 'init', 'register_shortcodes');