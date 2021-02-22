<?php
// Funktion Registrieren der Block Vorlage
function my_block_template() {
    register_block_pattern(
        'my_template/example-block-template',
        array('categories'  => array('buttons'),      
            'title'     => 'Image | Text',
            'content'   => "<!-- wp:columns {\"gradient\":\"luminous-vivid-amber-to-luminous-vivid-orange\"} -->\n<div class=\"wp-block-columns has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background has-background\"><!-- wp:column {\"width\":\"50px\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50px\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"100%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:100%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
        )
    );  
    register_block_pattern(
        'my_template/gallery',
        array('categories'  => array('gallery'),      
            'title'     => 'LB-Gallery',
            'content'   => "<!-- wp:group {\"backgroundColor\":\"vivid-cyan-blue\"} -->\r\n<div class=\"wp-block-group has-vivid-cyan-blue-background-color lb_gallery\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\r\n<div class=\"wp-block-columns\"><!-- wp:column -->\r\n<div class=\"wp-block-column lb_gallery_image\"></div>\r\n<!-- /wp:column -->\r\n<!-- wp:column {\"backgroundColor\":\"cyan-bluish-gray\"} -->\r\n<div class=\"wp-block-column lb_gallery_spacer has-cyan-bluish-gray-background-color has-background \"><!-- wp:spacer {\"height\":10} -->\r\n<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer --></div>\r\n<!-- /wp:column -->\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column lb_gallery_image\"></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns --></div></div>\r\n<!-- wp:columns -->\r\n<div class=\"wp-block-columns\"><!-- wp:column {\"backgroundColor\":\"cyan-bluish-gray\"}  -->\r\n<div class=\"wp-block-column lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"><!-- wp:spacer {\"height\":10} -->\r\n<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer --></div>\r\n<!-- /wp:column -->\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column lb_gallery_image\"></div>\r\n<!-- /wp:column -->\r\n<!-- wp:column  {\"backgroundColor\":\"cyan-bluish-gray\"} -->\r\n<div class=\"wp-block-column lb_gallery_spacer has-cyan-bluish-gray-background-color has-background\"><!-- wp:spacer {\"height\":10} -->\r\n<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n<!-- /wp:group -->",
        )
    );
}

// Aufruf der Funktion im init Hook
add_action( 'init', 'my_block_template' );