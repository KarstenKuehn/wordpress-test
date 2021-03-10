<?php
/*
Plugin Name: Block Vorlage-Sammlung
Description: Nützliche Shortcodes für meine Website
Author: BS-Lottobayern
*/

// Funktion Registrieren der Block Vorlage
function my_block_template() {
    register_block_pattern(
        'my_template/example-block-template',
        array('categories'  => array('lb_vorlagen'),      
            'title'     => 'Image | Text',
            'content'   => "<!-- wp:columns {\"gradient\":\"luminous-vivid-amber-to-luminous-vivid-orange\"} -->\n<div class=\"wp-block-columns has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background has-background\"><!-- wp:column {\"width\":\"50px\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50px\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"100%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:100%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
        )
    );  
    register_block_pattern(
        'my_template/gallery',
        array('categories'  => array('lb_vorlagen'),      
            'title'     => 'LB-Gallery',
            'content'   => "<!-- wp:group {\"className\":\"lb_gallery\",\"backgroundColor\":\"vivid-cyan-blue\"} -->\r\n<div class=\"wp-block-group lb_gallery has-vivid-cyan-blue-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\r\n<div class=\"wp-block-columns\"><!-- wp:column {\"className\":\"lb_gallery_image\"} -->\r\n<div class=\"wp-block-column lb_gallery_image\"><!-- wp:image {\"className\":\"my_image\"} -->\r\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\r\n<!-- /wp:image --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"className\":\"lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"} -->\r\n<div class=\"wp-block-column lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"><!-- wp:spacer {\"height\":10} -->\r\n<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"className\":\"lb_gallery_image\"} -->\r\n<div class=\"wp-block-column lb_gallery_image\"></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:columns -->\r\n<div class=\"wp-block-columns\"><!-- wp:column {\"className\":\"lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"} -->\r\n<div class=\"wp-block-column lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"><!-- wp:spacer {\"height\":10} -->\r\n<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"className\":\"lb_gallery_image\"} -->\r\n<div class=\"wp-block-column lb_gallery_image\"></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"className\":\"lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"} -->\r\n<div class=\"wp-block-column lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"><!-- wp:spacer {\"height\":10} -->\r\n<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns --></div></div>\r\n<!-- /wp:group -->",
        )
    );

    register_block_pattern(
        'my_template/slider',
        array('categories'  => array('lb_vorlagen'),      
            'title'     => 'Slider',
            'content'   => "<!-- wp:group {\"className\":\"slideshow-container\",\"backgroundColor\":\"cyan-bluish-gray\",\"textColor\":\"black\"} -->\r\n<div class=\"wp-block-group slideshow-container has-black-color has-cyan-bluish-gray-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"className\":\"mySlides fade block\"} -->\r\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile mySlides fade block\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:paragraph {\"placeholder\":\"Inhalt\u2026\",\"className\":\"text\",\"fontSize\":\"large\"} -->\r\n<p class=\"text has-large-font-size\"></p>\r\n<!-- /wp:paragraph --></div></div>\r\n<!-- /wp:media-text -->\r\n\r\n<!-- wp:media-text {\"className\":\"mySlides fade\"} -->\r\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile mySlides fade\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:paragraph {\"placeholder\":\"Inhalt\u2026\",\"className\":\"text\",\"fontSize\":\"large\"} -->\r\n<p class=\"text has-large-font-size\"></p>\r\n<!-- /wp:paragraph --></div></div>\r\n<!-- /wp:media-text -->\r\n\r\n<!-- wp:media-text {\"className\":\"mySlides fade\"} -->\r\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile mySlides fade\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:paragraph {\"placeholder\":\"Inhalt\u2026\",\"className\":\"text\",\"fontSize\":\"large\"} -->\r\n<p class=\"text has-large-font-size\"></p>\r\n<!-- /wp:paragraph --></div></div>\r\n<!-- /wp:media-text -->
<!-- wp:freeform -->\r\n<a class=\"prev_slide\" onclick=\"plusSlides(-1)\">❮</a><a class=\"next_slide\" onclick=\"plusSlides(1)\">❯</a>\r\n<!-- /wp:freeform --><!-- wp:freeform --><div id=\"dots\" class=\"dots\"></div><!-- /wp:freeform --></div></div>\r\n<!-- /wp:group -->",
        )
    );

}

// Aufruf der Funktion im init Hook
add_action( 'init', 'my_block_template' );

