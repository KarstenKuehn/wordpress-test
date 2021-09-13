<?php

/**
Register Custom Block Styles
*/
if ( ! defined( 'ABSPATH' ) ) exit;
/**
Enqueue Block Styles Javascript
*/


function image_ap_block_scripts() {
wp_enqueue_script(

'image-ap-block-scripts-js', plugins_url( '/blocks.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), filemtime( plugin_dir_path( __FILE__ ) . '/blocks.js' )
);
}
add_action( 'enqueue_block_editor_assets', 'image_ap_block_scripts' );

/**
Enqueue Block Styles Stylesheet
*/
function image_ap_block_styles() {
wp_enqueue_style( 'image-ap-block-styles-css', plugins_url( '/block-styles.css', __FILE__ )
);
}
add_action( 'enqueue_block_assets', 'image_ap_block_styles' );
  $my_dir=plugin_dir_path( __FILE__ );
  echo $my_dir.'<hr>';

die;
function register_image_ap_block() {
	register_block_type_from_metadata(
		__DIR__ . '/image_ap'
	);



require $my_dir.'image-ap/index.php';



    register_block_type(
      $my_dir.'image-ap');


}
add_action( 'init', 'register_image_ap_block' );