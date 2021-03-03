<?php seo_header();?>

<body <?php body_class(); ?>>
	<?php //bs_site_logo(); ?>

	<?php //get_custom_logo_url(); ?>
		<div class="lb-header">
			<div>
				logo
			</div>		
			<div>
				navi1
			</div>
			<div>
				navi2
			</div>
			<div>
				suche
			</div>			
		</div>
		<header id="site-header" class="header-footer-group" role="banner">

			<div class="header-inner section-inner">

				<div class="header-titles-wrapper">
					<div class="header-titles">

						<?php
							// Site title or logo.
							bs_site_logo();

							// Site description.
							//bs_site_description();
						?>

					</div><!-- .header-titles -->
					<?php

					// Check whether the header search is activated in the customizer.
					$enable_header_search = get_theme_mod( 'enable_header_search', true );

					if ( true === $enable_header_search ) {

						?>

						<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
							<span class="toggle-inner">
								<span class="toggle-icon">
									<?php bs_the_theme_svg( 'search' ); ?>
								</span>
								<span class="toggle-text"><?php _ex( 'Search', 'toggle text', 'twentytwenty' ); ?></span>
							</span>
						</button><!-- .search-toggle -->

					<?php } ?>



					<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
						<span class="toggle-inner">
							<span class="toggle-icon">
								<?php bs_the_theme_svg( 'ellipsis' ); ?>
							</span>
							<span class="toggle-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
						</span>
					</button><!-- .nav-toggle -->


				<div class="header-navigation-wrapper">

					<?php			

					if ( has_nav_menu( 'top-menu' ) || ! has_nav_menu( 'expanded' ) ) {
						
					wp_nav_menu( array( 
			    'theme_location' => 'top-menu', 
			    'container_class' => 'wp-block-column lotto_top-menu top-menu' ) ); 
				}

					if ( true === $enable_header_search || has_nav_menu( 'expanded' ) ) {
						?>

						<div class="header-toggles hide-no-js">

						<?php
						if ( has_nav_menu( 'expanded' ) ) {
							?>

							<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

								<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
									<span class="toggle-inner">
										<span class="toggle-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
										<span class="toggle-icon">
											<?php bs_the_theme_svg( 'ellipsis' ); ?>
										</span>
									</span>
								</button><!-- .nav-toggle -->

							</div><!-- .nav-toggle-wrapper -->

							<?php
						}

						if ( true === $enable_header_search ) {
							?>

							<div class="toggle-wrapper search-toggle-wrapper">

								<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">Suche 
									<span class="toggle-inner">
										<?php bs_the_theme_svg( 'search' ); ?>
									</span>
								</button><!-- .search-toggle -->

							</div>

							<?php
						}
						?>

						</div><!-- .header-toggles -->
						<?php
					}
					?>

				</div><!-- .header-navigation-wrapper -->
				</div><!-- .header-titles-wrapper -->

			</div><!-- .header-inner -->

			<?php
			// Output the search modal (if it is activated in the customizer).
			if ( true === $enable_header_search ) {
				get_template_part( 'template-parts/modal-search' );
			}
			?>

		</header><!-- #site-header -->
<div class="wp-block-columns lotto-header">
	<div class="wp-block-column lotto-logo">
		<figure class="wp-block-image size-large is-resized is-style-rounded logo">
			<a href="/">
			<picture>
				<source media="(max-width: 899px)" srcset="/wp-content/uploads/2021/02/lotto_small.png">
				<source srcset="/wp-content/uploads/2021/02/lotto_transparent.png">
				<img alt="test" class="wp-image-21" data-src="/wp-content/uploads/2021/02/lotto_small.png">
			</picture>
			</a>
		</figure>
	</div>
			<?php
			wp_nav_menu( array( 
			    'theme_location' => 'top-menu', 
			    'container_class' => 'wp-block-column lotto_top-menu top-menu' ) ); 
			?>

</div>



			<?php
			// Output the search modal (if it is activated in the customizer).
			if ( true === $enable_header_search ) {
				get_template_part( 'template-parts/modal-search' );
			}
			?>
					<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );