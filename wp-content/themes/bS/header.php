<?php seo_header();?>

<body id="myBody">
	<?php echo get_skiplinks();?>
	<?php 
		$name_of_menu = 'Hauptnavigation';
	?>
	<div class="header_out"><div class="header">
		<div class="site-logo">
			<div class="desktop_hidden"><button onclick="backNavi()" id="back_navi">
			<span class="material-icons">arrow_back_ios</span>
			</button></div>
			
			<?php bs_site_logo();?>
		</div><div class="desktop_navi mobile_hidden">
		<?php
		echo haupt_menu($name_of_menu,'d');	
		?>
		</div><div class="nav-frame">
		<?php
			// Site search
			$enable_header_search = get_theme_mod( 'enable_header_search', true );
			if ( true === $enable_header_search ) {
		?>

		<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false" aria-label="suche">
			<span class="material-icons">search</span><span class="mobile_hidden label">Suche</span>
		</button>
		<?php
			}
		?>
		<button class="toggle nav-toggle mobile-nav-toggle desktop_hidden" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle" id="menu" aria-label="menu">				
			<span class="material-icons"></span>
		</button>

		</div>
	</div>
</div>
<div class="sub_menu mobile_hidden" id="sub_menu">
	<div class="mobile_hidden menu_close"><span class="material-icons" onclick="closeNavi()">close</span></div>
	<?php

echo getSubMenu($name_of_menu,'d');
		?>
</div>
<?php 
	if ( true === $enable_header_search ) {
		get_template_part( 'template-parts/modal-search' );
	}
	get_template_part( 'template-parts/modal-menu' );
	//seo_breadcrumb(); 
?>
