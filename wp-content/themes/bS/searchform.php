<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$bs_unique_id = bs_unique_id( 'search-form-' );

$bs_aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr_x( $args['label'],'bS' ) . '"' : '';

?>
<form role="search" <?php echo $bs_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <!--
	<label for="s" id="s_label">
		<span class="screen-reader-text"><?php _e( 'Search for:', 'bS' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></span>
		<input type="search" id="s" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'bS' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
-->
<div class="searchformfld"><input type="text" name="s" value="<?php echo get_search_query(); ?>" id="s" class="text-field" onclick="this.select()" placeholder=" "><label for="s"><?php echo esc_attr_x( $args['placeholder'],'bS' ); ?></label>


	<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'bS' ); ?>" class ="html5_btn" /></div>
</form>
