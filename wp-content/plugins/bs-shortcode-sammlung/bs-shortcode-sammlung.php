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
   $form_html='<form action="" method="post" class="kontakt-form">
   <div class="searchformfld">
      <input type="text" name="first_name" value="" id="first_name" class="text-field" onClick="this.select()" placeholder=" "/>
      <label for="first_name">First Name</label>
   </div><br>
   <div class="searchformfld">
      <input type="text" name="last_name" value="" id="last_name" class="text-field" onClick="this.select()" placeholder=" "/>
      <label for="last_name">Last Name</label>
   </div><br>
   <div class="searchformfld">
      <input type="text" name="email" value="" id="email" class="text-field" onClick="this.select()" placeholder=" "/>
      <label for="email">Email</label>
   </div><br>
   <div class="searchformfld">
      <textarea rows="5" name="message" cols="30" class="text-field" id="message" placeholder=" "></textarea>
      <label for="message">Message</label>
   </div><br>
   <input type="submit" name="submit" value="Submit" class="button">
</form>';
return $form_html;
}

//add_shortcode('meinshortcode', 'meinshortcode_function' );

function register_shortcodes(){
   add_shortcode('meinshortcode', 'meinshortcode_function' );
      add_shortcode('kontaktform_shortcode', 'kontaktform_shortcode' );
}
add_action( 'init', 'register_shortcodes');