<?php
/**
 * Displays the search icon and modal
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>


<?php 
	$active_class = '';
    if ( is_search() ) {
    	$active_class = ' show-modal active';
	}
?>


<div class="search-modal cover-modal header-footer-group<?php echo $active_class?>" data-modal-target-string=".search-modal">

	<div class="search-modal-inner modal-inner">

		<div class="section-inner">
			<div class="suche_svg_icon">
				<?php echo bs_get_theme_svg( 'suche','ui','#1F5DA6' ); ?>
			</div>
			<?php
			get_search_form(
				array(
					'label' => __( 'Search for:', 'bS' ),
					'placeholder' => __( 'Suchbegriff eingeben:', 'bS' ) 
				)
			);
			?>

			<button class="toggle search-untoggle close-search-toggle fill-children-current-color" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
				<span class="screen-reader-text"><?php _e( 'Suche schließen', 'bS' ); ?></span><?php echo bs_get_theme_svg( 'cross','ui','#1F5DA6' ); ?>
			</button><!-- .search-toggle -->

		</div><!-- .section-inner -->

	</div><!-- .search-modal-inner -->

</div><!-- .menu-modal -->
