<?php

/**
Register Custom Block Styles
*/
if ( ! defined( 'ABSPATH' ) ) exit;
/**
Enqueue Block Styles Javascript
*/


function accordion_item_block_scripts() {
wp_enqueue_script(

'accordion_item_scripts-js', plugins_url( '/blocks.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), filemtime( plugin_dir_path( __FILE__ ) . '/blocks.js' )
);
}
add_action( 'enqueue_block_editor_assets', 'accordion_item_block_scripts' );

/**
Enqueue Block Styles Stylesheet
*/
function accordion_item_block_styles() {
wp_enqueue_style( 'accordion_item_block-styles-css', plugins_url( '/block-styles.css', __FILE__ )
);
}
add_action( 'enqueue_block_assets', 'accordion_item_block_styles' );