<?php seo_header();?>

<body <?php body_class(); ?>>
	<?php echo get_skiplinks();?><div class="header_out">	
	<div class="header"><?php bs_site_logo();?><div class="lb_navi">
			<?php
			// Site Navi.
			if ( has_nav_menu( 'top-menu' ) ) {
				wp_nav_menu( array( 
			    'theme_location' => 'top-menu', 'depth' => 1 ) ); 					    
			}						
			?>
		</div><div class="desktop_navi mobile_hidden">
		<?php

			if ( has_nav_menu( 'top-menu' ) ) {
				wp_nav_menu( array( 
			    'theme_location' => 'top-menu', 'depth' => 1 ) ); 					    
			}	

		?>
		</div><div class="nav-frame">
		<?php
			// Site search
			$enable_header_search = get_theme_mod( 'enable_header_search', true );
						if ( true === $enable_header_search ) {
							?>
			<img src="/wp-content/themes/bS/assets/search.svg" class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false"/><span class="mobile_hidden label">Suche</span>
								<!-- .search-toggle -->
		<?php
						}
		?>
			<img src="/wp-content/themes/bS/assets/menu.svg" class="mobile_menu_open_button desktop_hidden" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle"/>
			<img src="/wp-content/themes/bS/assets/close.svg" class="mobile_menu_close_button desktop_hidden" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle"/>
			<!-- .nav-toggle -->	
		</div>
	</div>
</div>
<?php 
			if ( true === $enable_header_search ) {
				get_template_part( 'template-parts/modal-search' );
			}


			get_template_part( 'template-parts/modal-menu' );
seo_breadcrumb(); ?>
<?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); 