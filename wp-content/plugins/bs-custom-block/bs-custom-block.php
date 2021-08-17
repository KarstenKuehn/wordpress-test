<?php
/*
Plugin Name: Block Vorlage-Sammlung
Description: Nützliche Shortcodes für meine Website
Author: BS-Lottobayern
*/
function kb_whitelist_blocks()
{
    return array(
        'core/columns',
        'core/column',
        'core/group',
        'core/spacer',
        'core/groups',
        'core/heading',
        'core/paragraph',
        'core/media-text',
        'core/image',
        'core/video',
        'core/list',
        'core/table',
        'core/quote',
        'core/latest-posts',
        'core/more',
        'core/buttons',
        'core_tabs',
        'core/html',
        'core/embed',
        'core/separator',
        'lb/slide-item-content',
        'lb/two-column-text',
        'lb/hero-img',
        'lb/text-img',
        'lb/img-text',
        'my-first-gutenberg-block/image-with-text-block',
        'my-lb-block/accordion-item',
        'lb/button',
        'lb/more-link',
        'lb/extranavi',
        'lb/media-text',
        'lb/presse-img-text',
        'lb/presse-text-img',
        'lb/section',
        'lb/teaser-slide-frame',
        'lb/teaser-slide-item',
        'lb/teaser-slide-thumbs-frame',
        'lb/teaser-slide-thumb-item',
        'lb/content-slide-frame',
        'lb/lotterie-slide-item',
        'lb/text-media',
        'lb/benefits-text',
        'lb/text-two-cta-img',
        'lb/img-text-two-cta',
        'lb/verlinkungen-frame',
        'lb/testimonial',
        'core/shortcode',
        'core/editor',
        'core/block-editor',
        'ub/tabbed-content-block',
        'ub/tabbed-content',
        'ub/tab-block',
        "ub/content-toggle-block",        
        "ub/content-toggle",
        "ub/content-toggle-panel",
        'ub/content-toggle-panel-block',
        /*******BITV****/
        'bitv/section',
        'bitv/button',
        'bitv/testimonial',
        'bitv/two-column-text',
        'bitv/one-column-text',
        'bitv/image-text',
        'bitv/text-image',
        //'bitv/accordion',
        'bitv/benefits-text',
        'bitv/zwei-teaser-modul',
    );
}

add_filter('allowed_block_types', 'kb_whitelist_blocks');


// Funktion Registrieren der Block Vorlage
function my_block_template() {

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
            'content'   => "<!-- wp:group {\"style\":{\"color\":{\"background\":\"#eceff2\"}},\"className\":\"slideshow-container\"} -->\r\n<div class=\"wp-block-group slideshow-container content-slider has-background\" style=\"background-color:#eceff2\"><div class=\"wp-block-group__inner-container\"></div></div>\r\n<!-- /wp:group -->",
        )
    );  
    register_block_pattern(
        'my_template/slider-teaser',
        array('categories'  => array('lb_vorlagen'),      
            'title'     => 'Teaser Slider',
            'content'   => "<!-- wp:group {\"style\":{\"color\":{\"background\":\"#cbe5f5\"}},\"className\":\"slideshow-container xx swiper-container mySwiper\"} -->\r\n<div class=\"wp-block-group slideshow-container xx full has-background swiper-container mySwiper\" style=\"background-color:#cbe5f5\"><div class=\"wp-block-group__inner-container\"></div></div>\r\n<!-- /wp:group -->",
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

function loadContentSlide() {
  wp_enqueue_script(
    'slide-item_content',
    plugin_dir_url(__FILE__) . 'slide-item_content.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadContentSlide');

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

function loadTwoColumnText() {
  wp_enqueue_script(
    'TwoColumnText',
    plugin_dir_url(__FILE__) . 'two_column.js',
    array('wp-blocks','wp-editor'),
    true
  );
}

add_action('enqueue_block_editor_assets', 'loadTwoColumnText');


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


function load_button_link() {
  wp_enqueue_script(
    'button_link',
    plugin_dir_url(__FILE__) . 'button_link.js',
    array( 'wp-blocks','wp-editor', 'wp-element' ),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'load_button_link');


function load_more_link() {
  wp_enqueue_script(
    'more_link',
    plugin_dir_url(__FILE__) . 'more_link.js',
    array( 'wp-blocks','wp-editor', 'wp-element' ),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'load_more_link');


function load_TeaserSlideFrame() {
  wp_enqueue_script(
    'Teaser-Slide-Frame',
    plugin_dir_url(__FILE__) . 'teaser-slide-frame.js',
    array( 'wp-blocks','wp-editor', 'wp-element' ),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'load_TeaserSlideFrame');

function loadTeaserSlide() {
  wp_enqueue_script(
    'teaser-slide-item',
    plugin_dir_url(__FILE__) . 'teaser-slide-item.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadTeaserSlide');

function load_TeaserThumbsSlideFrame() {
  wp_enqueue_script(
    'Teaser-Slide-Thumbs-Frame',
    plugin_dir_url(__FILE__) . 'teaser-slide-thumbs-frame.js',
    array( 'wp-blocks','wp-editor', 'wp-element' ),
    true
  );
}

add_action('enqueue_block_editor_assets', 'load_TeaserThumbsSlideFrame');

function loadTeaserThumbSlide() {
  wp_enqueue_script(
    'teaser-slide-thumb-item',
    plugin_dir_url(__FILE__) . 'teaser-slide-thumb-item.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadTeaserThumbSlide');



function load_ContentSlideFrame() {
  wp_enqueue_script(
    'Content-Slide-Frame',
    plugin_dir_url(__FILE__) . 'content-slide-frame.js',
    array( 'wp-blocks','wp-editor', 'wp-element' ),
    true
  );
}

add_action('enqueue_block_editor_assets', 'load_ContentSlideFrame');


function load_LotterieSlideItem() {
  wp_enqueue_script(
    'Lotterie-Slide-Item',
    plugin_dir_url(__FILE__) . 'lotterie-slide-item.js',
    array( 'wp-blocks','wp-editor', 'wp-element' ),
    true
  );
}

add_action('enqueue_block_editor_assets', 'load_LotterieSlideItem');

function load_VerlinkungenFrame() {


$args = array(
        'category-name'       => 'news',
      'sort_order'   => 'desc',
      'posts_per_page'   => 5,
    );
$posts = get_posts($args);
  wp_enqueue_script(
    'Verlinkungen-Frame',
    plugin_dir_url(__FILE__) . 'verlinkungen-frame.js',
    array( 'wp-blocks','wp-editor', 'wp-element' ),
    true
  );
}

add_action('enqueue_block_editor_assets', 'load_VerlinkungenFrame');


function loadTextCTASImage() {
  wp_enqueue_script(
    'text-image-2cta-block',
    plugin_dir_url(__FILE__) . 'text-image-2cta-block.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadTextCTASImage');

function loadImageTextCTAS() {
  wp_enqueue_script(
    'image-text-2cta-block',
    plugin_dir_url(__FILE__) . 'image-2cta-text-block.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
  
 add_action('enqueue_block_editor_assets', 'loadImageTextCTAS');



function loadTestimonial() {
  wp_enqueue_script(
    'testimonial',
    plugin_dir_url(__FILE__) . 'testimonial.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadTestimonial');

/* BITV Module */

function loadTestimonialBITV() {
  wp_enqueue_script(
    'bitv-testimonial',
    plugin_dir_url(__FILE__) . 'bitv-testimonial.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadTestimonialBITV');

function loadTwoColumnBITV() {
  wp_enqueue_script(
    'bitv-zwei-spalten',
    plugin_dir_url(__FILE__) . 'bitv-two_column.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadTwoColumnBITV');


function loadBenefitsTextBITV() {
  wp_enqueue_script(
    'bitv-benefits-text',
    plugin_dir_url(__FILE__) . 'bitv-benefits-text.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadBenefitsTextBITV');

function loadButtonBITV() {
  wp_enqueue_script(
    'bitv-button',
    plugin_dir_url(__FILE__) . 'bitv-button_link.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadButtonBITV');

function loadOneColumnBITV() {
  wp_enqueue_script(
    'bitv-eine-spalte',
    plugin_dir_url(__FILE__) . 'bitv-one_column.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadOneColumnBITV');

function loadImageTextBITV() {
  wp_enqueue_script(
    'bitv-image-text',
    plugin_dir_url(__FILE__) . 'bitv-image-text.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadImageTextBITV');

function loadTextImageBITV() {
  wp_enqueue_script(
    'bitv-text-image',
    plugin_dir_url(__FILE__) . 'bitv-text-image.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadTextImageBITV');

function loadSectionBITV() {
  wp_enqueue_script(
    'bitv-section',
    plugin_dir_url(__FILE__) . 'bitv-section.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadSectionBITV');

function loadAccordionBITV() {
  wp_enqueue_script(
    'bitv-accordion',
    plugin_dir_url(__FILE__) . 'bitv-accordion.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadAccordionBITV');

function loadAccordionItemBITV() {
  wp_enqueue_script(
    'bitv-accordion-item',
    plugin_dir_url(__FILE__) . 'bitv-accordion_item.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadAccordionItemBITV');


function loadTeaserZweiBITV() {
  wp_enqueue_script(
    'bitv-2er-teaser',
    plugin_dir_url(__FILE__) . 'bitv-2er-teaser-modul.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadTeaserZweiBITV');


function custom_block_categories( $categories ) {
  return array_merge(
    $categories,
    [
      [
        'slug'  => 'bitv-blocks',
        'title' => 'BITV Blocks',
      ],
    ]
  );
}
add_action( 'block_categories', 'custom_block_categories', 10, 2 );