<?php //wp_footer();?>
<div class="footer">
<div class="footer1">
<label class="footer_item1 label">Unsere Marken</label>
<label class="footer_item1">
<img width="53" height="56" src="http://lbup.local/wp-content/uploads/2021/04/lottoBayern.png" data-src="http://lbup.local/wp-content/uploads/2021/04/lottoBayern.png" alt="lottoBayern">	
</label>	
<label class="footer_item1">
<img width="109" height="56" src="http://lbup.local/wp-content/uploads/2021/04/Spielbanken_Bayern_Logo-1.png" data-src="http://lbup.local/wp-content/uploads/2021/04/Spielbanken_Bayern_Logo-1.png" alt="spielbanken">
</label>
<p>Spielteilnahme erst ab 18 Jahren. Glückspiel kann süchtig machen. Infos und Hilfe unter www.bzga.de.<br>
Lotto Bayern verfüght über eine Erlaubnis der zuständigen Glückspielaufsichtsbehörde und steht unter deren Aufsicht.</p>
<p>Alle Angaben ohne Gewähr.</p>
</div>
<p><a class="footer_item2" href="#">Impressum</a><a class="footer_item2" href="#">Datenschutz</a><a class="footer_item2" href="#">Barrierefreiheit</a><a class="footer_item2" href="#">Kontakt</a></p>
</div>

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