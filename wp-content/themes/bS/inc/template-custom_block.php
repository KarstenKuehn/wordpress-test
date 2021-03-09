<?php
// Funktion Registrieren der Block Vorlage
function my_block_template() {
    register_block_pattern(
        'my_template/example-block-template',
        array('categories'  => array('buttons'),      
            'title'     => 'Image | Text',
            'content'   => "<!-- wp:columns {\"gradient\":\"luminous-vivid-amber-to-luminous-vivid-orange\"} -->\n<div class=\"wp-block-columns has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background has-background my_block\"><!-- wp:column {\"width\":\"50px\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50px\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"100%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:100%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
        )
    );  
    register_block_pattern(
        'my_template/gallery',
        array('categories'  => array('gallery'),      
            'title'     => 'LB-Gallery',
            'content'   => "<!-- wp:group {\"className\":\"lb_gallery\",\"backgroundColor\":\"vivid-cyan-blue\"} -->\r\n<div class=\"wp-block-group lb_gallery has-vivid-cyan-blue-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\r\n<div class=\"wp-block-columns\"><!-- wp:column {\"className\":\"lb_gallery_image\"} -->\r\n<div class=\"wp-block-column lb_gallery_image\"><!-- wp:image {\"className\":\"my_image\"} -->\r\n<figure class=\"my_image\"><img alt=\"\"/></figure>\r\n<!-- /wp:image --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"className\":\"lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"} -->\r\n<div class=\"wp-block-column lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"><!-- wp:spacer {\"height\":10} -->\r\n<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"className\":\"lb_gallery_image\"} -->\r\n<div class=\"wp-block-column lb_gallery_image\"></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:columns -->\r\n<div class=\"wp-block-columns\"><!-- wp:column {\"className\":\"lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"} -->\r\n<div class=\"wp-block-column lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"><!-- wp:spacer {\"height\":10} -->\r\n<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"className\":\"lb_gallery_image\"} -->\r\n<div class=\"wp-block-column lb_gallery_image\"></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"className\":\"lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"} -->\r\n<div class=\"wp-block-column lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"><!-- wp:spacer {\"height\":10} -->\r\n<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns --></div></div>\r\n<!-- /wp:group -->",
        )
    );
}

// Aufruf der Funktion im init Hook
add_action( 'init', 'my_block_template' );