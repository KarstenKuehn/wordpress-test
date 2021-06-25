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

function kontaktform_shortcode(){
   $form_html='<form action="" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Email: <input type="text" name="email"><br>
Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>';
return $form_html;
}

//add_shortcode('meinshortcode', 'meinshortcode_function' );

function register_shortcodes(){
   add_shortcode('meinshortcode', 'meinshortcode_function' );
      add_shortcode('kontaktform_shortcode', 'kontaktform_shortcode' );
}
add_action( 'init', 'register_shortcodes');