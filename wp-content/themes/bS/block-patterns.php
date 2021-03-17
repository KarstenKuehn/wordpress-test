<?php
/**
 * Register block patterns.
 * Include this file in your theme, and update image paths, prefix and text domain.
 *
 * @link https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
 */

/**
 * Make sure that block patterns are enabled before registering.
 * Requires WordPress version 5.5 or Gutenberg version 7.8.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	/**
	 * Check if the register_block_pattern_category exists.
	 * Requires WordPress 5.5 or Gutenberg version 8.2.
	 */
	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category( 'lb_vorlagen', array( 'label' => _x( 'LB Vorlagen', 'Block pattern category' ) ) );
		register_block_pattern_category( 'forms', array( 'label' => __( 'Forms', 'text-domain' ) ) );
		register_block_pattern_category( 'example', array( 'label' => __( 'Example', 'text-domain' ) ) );
		register_block_pattern_category( 'blog', array( 'label' => __( 'Blog', 'text-domain' ) ) );
		register_block_pattern_category( 'shop', array( 'label' => __( 'Shop', 'text-domain' ) ) );
	}

	/**
	 * Example 1: Contact form with flower background.
	 * Requires the Ninja Forms plugin: https://wordpress.org/plugins/ninja-forms/
	 * The form ID used in the example is the default ID.
	 *
	 * First, check if Ninja Forms is active.
	 */
	if ( class_exists( 'Ninja_Forms' ) ) {
		/**
		 * Register the pattern.
		 */
		register_block_pattern(
			'theme-slug/pattern-slug',
			array(
				'title'       => __( 'Contact form', 'text-domain' ),
				'categories'  => array( 'forms', 'example' ),
				'keywords'    => array( __( 'Contact', 'text-domain' ), __( 'Ninja', 'text-domain' ) ),
				'description' => __( 'A contact form with a flower background image and a heading above it.', 'text-domain' ),
				'content'     => '
					<!-- wp:cover {"className":"theme-slug-contact-form", "url":"' . esc_url( get_theme_file_uri( 'assets/images/flora.png' ) ) . '",
					"id":2038,"gradient":"blush-light-purple","contentPosition":"top center","align":"wide"} -->
					<div class="wp-block-cover theme-slug-contact-form alignwide has-background-dim has-background-gradient 
					has-custom-content-position is-position-top-center" 
					style="background-image:url(' . esc_url( get_theme_file_uri( 'assets/images/flora.png' ) ) . ')">
					<span aria-hidden="true" class="wp-block-cover__gradient-background 
					has-blush-light-purple-gradient-background"></span>
					<div class="wp-block-cover__inner-container">
					<!-- wp:heading {"align":"center","style":{"typography":{"fontSize":60}}} -->
					<h2 class="has-text-align-center" style="font-size:60px">' . __( 'Book an appointment', 'text-domain' ) . '</h2>
					<!-- /wp:heading -->
					<!-- wp:ninja-forms/form {"formID":1,"formName":"Contact Me ( ID: 1 )"} -->
					<div class="wp-block-ninja-forms-form">[ninja_forms id=1]</div>
					<!-- /wp:ninja-forms/form --></div></div>
					<!-- /wp:cover -->',
			)
		);
	}

	/**
	 * Example 2: Use a variable for the content.
	 * Uses the Ninja Forms plugin: https://wordpress.org/plugins/ninja-forms/
	 * The form ID used in the example is the default ID.
	 */

	$content = '
		<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( 'assets/images/flora.png' ) ) . '",
		"id":2038,"gradient":"blush-light-purple","contentPosition":"top center","align":"wide"} -->
		<div class="wp-block-cover alignwide has-background-dim has-background-gradient 
		has-custom-content-position is-position-top-center" 
		style="background-image:url(' . esc_url( get_theme_file_uri( 'assets/images/flora.png' ) ) . ')">
		<span aria-hidden="true" class="wp-block-cover__gradient-background 
		has-blush-light-purple-gradient-background"></span>
		<div class="wp-block-cover__inner-container">
		<!-- wp:heading {"align":"center","style":{"typography":{"fontSize":60}}} -->
		<h2 class="has-text-align-center" style="font-size:60px">' . __( 'Book an appointment', 'text-domain' ) . '</h2>
		<!-- /wp:heading -->';

	/** Check if Ninja forms is active. */
	if ( function_exists( 'ninja_forms' ) ) {
		$content .= ' <!-- wp:ninja-forms/form {"formID":1,"formName":"Contact Me ( ID: 1 )"} -->
			<div class="wp-block-ninja-forms-form">[ninja_forms id=1]</div>
			<!-- /wp:ninja-forms/form -->';
		/**
		 * If not, display a message asking to install and activate the plugin.
		 * -This can be improved to make sure that the message is not displayed to visitors.
		*/
	} elseif ( current_user_can( 'publish_posts' ) ) {
		$content .= '<!-- wp:paragraph --><p>' . __( 'Please install a contact form plugin to use with this pattern.', 'text-domain' ) . '</p><!-- /wp:paragraph -->';
	}

	$content .= '</div></div><!-- /wp:cover -->';

	register_block_pattern(
		'theme-slug/contact-form-2',
		array(
			'title'       => __( 'Contact form 2', 'text-domain' ),
			'categories'  => array( 'forms', 'example' ),
			'keywords'    => array( __( 'Contact', 'text-domain' ), __( 'Ninja', 'text-domain' ) ),
			'description' => __( 'A contact form with a flower background image and a heading above it.', 'text-domain' ),
			'content'     => $content,
		)
	);
}