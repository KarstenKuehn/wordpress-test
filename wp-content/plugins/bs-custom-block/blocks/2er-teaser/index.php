<?php

/**
Register Custom Block Styles
*/
if ( ! defined( 'ABSPATH' ) ) exit;
/**
Enqueue Block Styles Javascript
*/


function zweier-teaser-block_scripts() {
wp_enqueue_script(

'zweier-teaser-block-scripts-js', plugins_url( '/blocks.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), filemtime( plugin_dir_path( __FILE__ ) . '/blocks.js' )
);
}
add_action( 'enqueue_block_editor_assets', 'zweier-teaser-block_scripts' );

/**
Enqueue Block Styles Stylesheet
*/
function zweier-teaser-block_styles() {
wp_enqueue_style( zweier-teaser-block-styles-css', plugins_url( '/block-styles.css', __FILE__ )
);
}
add_action( 'enqueue_block_assets', 'zweier-teaser-block_styles' );