<?php //wp_footer();?>

	<div class="footer-top footer-top-visible has-footer-menu has-social-menu">

		<nav aria-label="Social-Media-Links" class="footer-social-wrapper">

			<ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">

				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'social',
						'container'       => '',
						'container_class' => '',
						'items_wrap'      => '%3$s',
						'menu_id'         => '',
						'menu_class'      => '',
						'depth'           => 1,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
						'fallback_cb'     => '',
					)
				);
				?>

			</ul><!-- .footer-social -->

		</nav><!-- .footer-social-wrapper -->
	</div>
<?php
wp_nav_menu( array( 
    'theme_location' => 'footer-menu', 
    'container_class' => 'footer-menu' ) ); 
?>	
<?php footer();?>