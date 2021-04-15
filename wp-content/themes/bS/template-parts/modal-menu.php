<?php
/**
 * Displays the menu icon and modal
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<div class="menu-modal cover-modal header-footer-group" data-modal-target-string=".menu-modal">

			<div class="mobile-menu">	
<span class="material-icons" onclick="backNavi()" id="back_navi">arrow_back_ios</span><br><br><hr>
				<?php


$name_of_menu = 'Hauptnaviagtion';
/*
 $a = wp_get_menu_array($name_of_menu);    
 echo '<pre>';                     
 print_r($a); 
 echo '</pre>';
 */
echo haupt_menu($name_of_menu,'m');				

				$mobile_menu_location = '';

				// If the mobile menu location is not set, use the primary and expanded locations as fallbacks, in that order.
				if ( has_nav_menu( 'mobile' ) ) {
					$mobile_menu_location = 'mobile';
				} elseif ( has_nav_menu( 'top-menu' ) ) {
					$mobile_menu_location = 'top-menu';
				} elseif ( has_nav_menu( 'expanded' ) ) {
					$mobile_menu_location = 'expanded';
				}
				?>



	</div><!-- .menu-modal-inner -->

</div><!-- .menu-modal -->
