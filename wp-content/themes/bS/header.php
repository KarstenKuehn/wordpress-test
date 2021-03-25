<?php seo_header();?>

<body <?php body_class(); ?>>
	<?php echo get_skiplinks();?>
	<div class="lb_header">
		<div class="lb_logo">
		<?php
			// Site title or logo.
			bs_site_logo();
		?>
		</div>
		<div class="lb_navi">
			<?php
			// Site Navi.
			if ( has_nav_menu( 'top-menu' ) ) {
				wp_nav_menu( array( 
			    'theme_location' => 'top-menu' ) ); 					    
			}						
			?>
			
		</div>
		<div class="lb_search" id="lb-search">
		<?php
			// Site search
			$enable_header_search = get_theme_mod( 'enable_header_search', true );
						if ( true === $enable_header_search ) {
							?>

								<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
									<span class="toggle-inner">
										<span class="toggle-icon">
											<?php bs_the_theme_svg( 'search' ); ?>
										</span>
										<span class="toggle-text screen-reader-text"><?php _e( 'Suche', 'twentytwenty' ); ?></span>

									</span>
								</button><!-- .search-toggle -->

							<?php
						}
		?>
		</div>
		<div class="lb_menu">
			<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
				<span class="toggle-inner">
					<span class="toggle-icon">
						<?php bs_the_theme_svg( 'menu','ui','red' ); ?>
					</span>
					<span class="toggle-text screen-reader-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
				</span>
			</button><!-- .nav-toggle -->
		</div>		
	</div>

<br><br><br>

	<div class="lb_header">
		<div class="lb_logo">
		<?php
			// Site title or logo.
			bs_site_logo();
		?>
		</div><div class="lb_navi"><?php
			// Site Navi.
					if ( has_nav_menu( 'top-menu' ) ) {
						
						wp_nav_menu( array( 
					    'theme_location' => 'top-menu' ) ); 					    
					}						
		?>
		</div><div class="lb_search" id="lb-search">
		<?php
			// Site search
			$enable_header_search = get_theme_mod( 'enable_header_search', true );
						if ( true === $enable_header_search ) {
							?>

								<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false"> 
									<span class="toggle-inner">
										<?php bs_the_theme_svg( 'search' ); ?>
									</span>
								</button><!-- .search-toggle -->

							<?php
						}
		?>
		</div>
	</div>

			<?php
			// Output the search modal (if it is activated in the customizer).
			if ( true === $enable_header_search ) {
				get_template_part( 'template-parts/modal-search' );
			}
			?>
	
<?php seo_breadcrumb(); ?>
<?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); 

		get_template_part( 'template-parts/modal-menu' );