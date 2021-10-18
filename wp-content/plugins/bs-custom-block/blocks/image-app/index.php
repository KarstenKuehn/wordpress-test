<?php

/**
Register Custom Block Styles
*/
if ( ! defined( 'ABSPATH' ) ) exit;
/**
Enqueue Block Styles Javascript
*/


function image_app_block_scripts() {
wp_enqueue_script(

'image-app-block-scripts-js', plugins_url( '/blocks.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), filemtime( plugin_dir_path( __FILE__ ) . '/blocks.js' )
);
}
add_action( 'enqueue_block_editor_assets', 'image_app_block_scripts' );

/**
Enqueue Block Styles Stylesheet
*/
function image_app_block_styles() {
wp_enqueue_style( 'image-app-block-styles-css', plugins_url( '/block-styles.css', __FILE__ )
);
}
add_action( 'enqueue_block_assets', 'image_app_block_styles' );