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
      <input type="text" name="betreff" value="" id="betreff" class="text-field" onClick="this.select()" placeholder=" " required/>
      <label for="betreff">Betreff<sup class="pflicht">*</sup></label>
   </div><br>
      <div class="searchformfld">
      <input type="text" name="anrede" value="" id="anrede" class="text-field" onClick="this.select()" placeholder=" "/>
      <label for="anrede">Anrede</label>
   </div><br>
   <div class="searchformfld">
      <input type="text" name="vorname" value="" id="vorname" class="text-field" onClick="this.select()" placeholder=" "/>
      <label for="vorname">Vorname </label>
   </div><br>
   <div class="searchformfld">
      <input type="text" name="nachname" value="" id="nachname" class="text-field" onClick="this.select()" placeholder=" "/>
      <label for="nachname">Nachname</label>
   </div><br>
   <div class="searchformfld">
      <input type="text" name="email" value="" id="email" class="text-field" onClick="this.select()" placeholder=" " required/>
      <label for="email">E-Mail<sup class="pflicht">*</sup></label>
   </div><br>
   <div class="searchformfld">
      <input type="text" name="telefon" value="" id="telefon" class="text-field" onClick="this.select()" placeholder=" "/>
      <label for="telefon">Telefon </label>
   </div><br>   
   <div class="searchformfld">
      <textarea rows="5" name="message" cols="30" class="text-field" id="message" placeholder=" " required></textarea>
      <label for="message">Ihre Nachricht<sup class="pflicht">*</sup></label>
   </div><br>
   <input type="submit" name="submit" value="Nachricht verschicken" class="button">
</form>';
return $form_html;
}

//add_shortcode('meinshortcode', 'meinshortcode_function' );

function register_shortcodes(){
   add_shortcode('meinshortcode', 'meinshortcode_function' );
      add_shortcode('kontaktform_shortcode', 'kontaktform_shortcode' );
}
add_action( 'init', 'register_shortcodes');
