<?php

/**
Register Custom Block Styles
*/
if ( ! defined( 'ABSPATH' ) ) exit;
/**
Enqueue Block Styles Javascript
*/


function ap_image_block_scripts() {

    if(isset($_GET['tf']))
    {
      echo ';hier';    
    }

wp_enqueue_script(

'ap-image-block-scripts-js', plugins_url( '/blocks.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), filemtime( plugin_dir_path( __FILE__ ) . '/blocks.js' )
);
}
add_action( 'enqueue_block_editor_assets', 'ap_image_block_scripts' );

/**
Enqueue Block Styles Stylesheet
*/
function ap_image_block_styles() {
wp_enqueue_style( 'ap-image-block-styles-css', plugins_url( '/block-styles.css', __FILE__ )
);
}
add_action( 'enqueue_block_assets', 'ap_image_block_styles' );