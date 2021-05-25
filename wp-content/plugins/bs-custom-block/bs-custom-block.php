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
            'content'   => "<!-- wp:group {\"className\":\"slideshow-container\",\"backgroundColor\":\"cyan-bluish-gray\",\"textColor\":\"black\"} -->\r\n<div class=\"wp-block-group slideshow-container has-black-color has-cyan-bluish-gray-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"className\":\"mySlides fade block\"} -->\r\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile mySlides fade block\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:paragraph {\"placeholder\":\"Inhalt\u2026\",\"className\":\"text\",\"fontSize\":\"large\"} -->\r\n<p class=\"text has-large-font-size\"></p>\r\n<!-- /wp:paragraph --></div></div>\r\n<!-- /wp:media-text -->\r\n\r\n<!-- wp:media-text {\"className\":\"mySlides fade\"} -->\r\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile mySlides fade\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:paragraph {\"placeholder\":\"Inhalt\u2026\",\"className\":\"text\",\"fontSize\":\"large\"} -->\r\n<p class=\"text has-large-font-size\"></p>\r\n<!-- /wp:paragraph --></div></div>\r\n<!-- /wp:media-text -->\r\n\r\n<!-- wp:media-text {\"className\":\"mySlides fade\"} -->\r\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile mySlides fade\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:paragraph {\"placeholder\":\"Inhalt\u2026\",\"className\":\"text\",\"fontSize\":\"large\"} -->\r\n<p class=\"text has-large-font-size\"></p>\r\n<!-- /wp:paragraph --></div></div>\r\n<!-- /wp:media-text --></div></div>\r\n<!-- /wp:group -->",
        )
    );

    register_block_pattern(
        'my_template/extranavi',
        array('categories'  => array('lb_vorlagen'),      
            'title'     => 'extraNavi',
            'content'   => "<!-- wp:group {\"style\":{\"color\":{\"background\":\"#f3f4f7\"}},\"className\":\"gray extra_navi_wrapper\"} -->\r\n<div class=\"wp-block-group gray extra_navi_wrapper has-background\" style=\"background-color:#f3f4f7\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"className\":\"content_section extranavi\"} -->\r\n<div class=\"wp-block-columns content_section extra_navi\"><!-- wp:column {\"className\":\"navi-item\"} -->\r\n<div class=\"wp-block-column navi-item\"><!-- wp:image -->\r\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\r\n<!-- /wp:image --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"className\":\"navi-item\"} -->\r\n<div class=\"wp-block-column navi-item\"><!-- wp:image -->\r\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\r\n<!-- /wp:image --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"className\":\"navi-item\"} -->\r\n<div class=\"wp-block-column navi-item\"><!-- wp:image -->\r\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\r\n<!-- /wp:image --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns --></div></div>\r\n<!-- /wp:group -->",
        )
    );

    register_block_pattern(
        'my_template/slider-new',
        array('categories'  => array('lb_vorlagen'),      
            'title'     => 'Content Slider',
            'content'   => "<!-- wp:group {\"style\":{\"color\":{\"background\":\"#eceff2\"}},\"className\":\"slideshow-container\"} -->\r\n<div class=\"wp-block-group slideshow-container has-background\" style=\"background-color:#eceff2\"><div class=\"wp-block-group__inner-container\"></div></div>\r\n<!-- /wp:group -->",
        )
    );  
    register_block_pattern(
        'my_template/slider-teaser',
        array('categories'  => array('lb_vorlagen'),      
            'title'     => 'Teaser Slider',
            'content'   => "<!-- wp:group {\"style\":{\"color\":{\"background\":\"#cbe5f5\"}},\"className\":\"slideshow-container xx\"} -->\r\n<div class=\"wp-block-group slideshow-container xx full has-background\" style=\"background-color:#cbe5f5\"><div class=\"wp-block-group__inner-container\"></div></div>\r\n<!-- /wp:group -->",
        )
    );

    register_block_pattern(
        'my_template/slide-item',
        array('categories'  => array('lb_vorlagen'),      
            'title'     => 'Slide-Item',
            'content'   => "<!-- wp:media-text {\"className\":\"mySlides fade block\"} -->\r\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile mySlides fade block\" id=\"test\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:paragraph {\"placeholder\":\"Inhalt\u2026\",\"className\":\"text\",\"fontSize\":\"large\"} -->\r\n<p class=\"text has-large-font-size\"></p>\r\n<!-- /wp:paragraph --></div></div>\r\n<!-- /wp:media-text -->",
        )
    );

}

// Aufruf der Funktion im init Hook
add_action( 'init', 'my_block_template' );

function loadMySlide() {
  wp_enqueue_script(
    'my-new-block',
    plugin_dir_url(__FILE__) . 'slide-item.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadMySlide');

function loadMyAccordion() {
  wp_enqueue_script(
    'my-new-accordion',
    plugin_dir_url(__FILE__) . 'accordion-item.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadMyAccordion');


function loadImageText() {
  wp_enqueue_script(
    'image-text-block',
    plugin_dir_url(__FILE__) . 'image-text-block.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadImageText');

function loadTextImage() {
  wp_enqueue_script(
    'text-image-block',
    plugin_dir_url(__FILE__) . 'text-image-block.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadTextImage');


function loadPresseTextImage() {
  wp_enqueue_script(
    'presse_text-image-block',
    plugin_dir_url(__FILE__) . 'presse_text-image-block.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadPresseTextImage');

function loadPresseImageText() {
  wp_enqueue_script(
    'presse_image-text-block',
    plugin_dir_url(__FILE__) . 'presse_image-text-block.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadPresseImageText');



function load_yy() {
  wp_enqueue_script(
    'my-new-yy',
    plugin_dir_url(__FILE__) . 'yy.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'load_yy');
/*

function load_xx() {
  wp_enqueue_script(
    'my-new-xx',
    plugin_dir_url(__FILE__) . 'two_column.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   


add_action('enqueue_block_editor_assets', 'load_xx');

*/

function loadTwoColumnText() {
  wp_enqueue_script(
    'TwoColumnText',
    plugin_dir_url(__FILE__) . 'two_column.js',
    array('wp-blocks','wp-editor'),
    true
  );
}

add_action('enqueue_block_editor_assets', 'loadTwoColumnText');

function loadTwoColumnTextGray() {
  wp_enqueue_script(
    'TwoColumnTextGray',
    plugin_dir_url(__FILE__) . 'two_column_gray.js',
    array('wp-blocks','wp-editor'),
    true
  );
}

add_action('enqueue_block_editor_assets', 'loadTwoColumnTextGray');


function load_extra_navi() {
  wp_enqueue_script(
    'extra_navi',
    plugin_dir_url(__FILE__) . 'extra_navi.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'load_extra_navi');


function load_hero_image() {
  wp_enqueue_script(
    'hero_image',
    plugin_dir_url(__FILE__) . 'hero_image.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'load_hero_image');

function loadTextVideo() {
  wp_enqueue_script(
    'text-video-block',
    plugin_dir_url(__FILE__) . 'text-media-block.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadTextVideo');



function loadVideoText() {
  wp_enqueue_script(
    'video-text-block',
    plugin_dir_url(__FILE__) . 'media-text-block.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadVideoText');


function load_benefits_column() {
  wp_enqueue_script(
    'benefis_column',
    plugin_dir_url(__FILE__) . 'benefits_column.js',
    array( 'wp-blocks','wp-editor', 'wp-element' ),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'load_benefits_column');

function load_section() {
  wp_enqueue_script(
    'section',
    plugin_dir_url(__FILE__) . 'section.js',
    array( 'wp-blocks','wp-editor', 'wp-element' ),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'load_section');
/*
function load_block_variations() {
  wp_enqueue_script(
    'block-variations',
    plugin_dir_url(__FILE__) . 'block-variations.js',
    array( 'wp-blocks','wp-editor', 'wp-element' ),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'load_block_variations');
*/