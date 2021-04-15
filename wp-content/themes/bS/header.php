<?php seo_header();?>

<body <?php body_class(); ?>>
	<?php echo get_skiplinks();?>
	<?php 

$name_of_menu = 'Hauptnaviagtion';
/*
 $a = wp_get_menu_array($name_of_menu);    
 echo '<pre>';                     
 print_r($a); 
 echo '</pre>';
 */

	?>
	<div class="header_out"><div class="header"><?php bs_site_logo();?><div class="desktop_navi mobile_hidden"><?php
echo haupt_menu($name_of_menu,'d');
			
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
			<img src="/wp-content/themes/bS/assets/search.svg" class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false" alt="search"/><span class="mobile_hidden label">Suche</span>
								<!-- .search-toggle -->
		<?php
			}
		?>
			<img src="/wp-content/themes/bS/assets/menu.svg" class="mobile_menu_open_button desktop_hidden" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle" alt="menu"/>
			<img src="/wp-content/themes/bS/assets/close.svg" class="mobile_menu_close_button desktop_hidden" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle" alt="menu_close">
			<!-- .nav-toggle -->	
		</div>
	</div>
</div>
<div class="sub_menu mobile_hidden">
	<?php
$a = wp_get_menu_array($name_of_menu);
//echo sub_menu('d',$a,1346);



						$current_nav_item =  my_get_menu_item_name( 'top-menu' );
						echo '<h2> ';
						echo $current_nav_item;
						echo '</h2>';
						$args = array(
						    'theme_location' => 'top-menu', // the one used on register_nav_menus
						    'submenu' => $current_nav_item , // could be used __() for translations
						    'depth' => 2
						);
						if($current_nav_item!='')
						wp_nav_menu( $args );

		?>
</div>
<?php 
	if ( true === $enable_header_search ) {
		get_template_part( 'template-parts/modal-search' );
	}
	get_template_part( 'template-parts/modal-menu' );
	//seo_breadcrumb(); 
?>
