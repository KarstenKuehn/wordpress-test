<?php seo_header();?>

<body <?php body_class(); ?>>
	<?php echo get_skiplinks();?><div class="header">
		<?php
			// Site title or logo.
			//bs_site_logo();
		?>
		<a class="site-title" href="/">
			<img class="logo" src="/wp-content/themes/bS/assets/logo.png"/>
		</a>
		<div class="lb_navi">
			<?php
			// Site Navi.
			if ( has_nav_menu( 'top-menu' ) ) {
				wp_nav_menu( array( 
			    'theme_location' => 'top-menu', 'depth' => 1 ) ); 					    
			}						
			?>
		</div>
		<div class="nav-frame">
		<?php
			// Site search
			$enable_header_search = get_theme_mod( 'enable_header_search', true );
						if ( true === $enable_header_search ) {
							?>
			<img src="/wp-content/themes/bS/assets/search.svg" class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false"/>
								<!-- .search-toggle -->
		<?php
						}
		?>
			<img src="/wp-content/themes/bS/assets/menu.svg" class="mobile_menu_open_button" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle"/>
			<img src="/wp-content/themes/bS/assets/close.svg" class="mobile_menu_close_button" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle"/>
			<!-- .nav-toggle -->	
		</div>
	</div>

<?php seo_breadcrumb(); ?>
<?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); 
get_template_part( 'template-parts/modal-menu' );