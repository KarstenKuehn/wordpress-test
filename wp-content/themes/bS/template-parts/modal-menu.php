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

				<?php

				$mobile_menu_location = '';

				// If the mobile menu location is not set, use the primary and expanded locations as fallbacks, in that order.
				if ( has_nav_menu( 'mobile' ) ) {
					$mobile_menu_location = 'mobile';
				} elseif ( has_nav_menu( 'top-menu' ) ) {
					$mobile_menu_location = 'top-menu';
				} elseif ( has_nav_menu( 'expanded' ) ) {
					$mobile_menu_location = 'expanded';
				}

echo $mobile_menu_location;
				if ( has_nav_menu( 'expanded' ) ) {
					$expanded_nav_classes = '';

					if ( 'expanded' === $mobile_menu_location ) {
						$expanded_nav_classes .= ' mobile-menu';
					}

					?>

		

						<ul class="modal-menu reset-list-style">
							<li><b></b></li>
							<?php
							if ( has_nav_menu( 'expanded' ) ) {
								wp_nav_menu(
									array(
										'container'      => '',
										'items_wrap'     => '%3$s',
										'show_toggles'   => true,
										'theme_location' => 'expanded',
									)
								);
							}
							?>
						</ul>


					<?php
				}
						$current_nav_item =  my_get_menu_item_name( 'top-menu' );
						echo '<h2> ';
						echo $current_nav_item;
						echo '</h2>';
				if ( 'expanded' !== $mobile_menu_location ) {
					?>
						<ul class="modal-menu reset-list-style">
						<?php



						if ( $mobile_menu_location ) {

						$args = array(
						    'theme_location' => 'top-menu', // the one used on register_nav_menus
						    'submenu' => $current_nav_item , // could be used __() for translations
						    'depth' => 2
						);

						wp_nav_menu( $args );

						?>

						<?php

						} else {

							wp_list_pages(
								array(
									'match_menu_classes' => true,
									'show_toggles'       => true,
									'title_li'           => false,
									'walker'             => new bS_Walker_Page(),
								)
							);

						}
						?>

						</ul>
						<?php 

						/*
						for ($m=1; $m < 10; $m++) { 
							$menu_id = 'sub-menu'.$m;
							if ( has_nav_menu( $menu_id ) ) 
							{
							?>
							<ul class="modal-menu reset-list-style">
								<?php
								echo '<li><b>'.wp_get_nav_menu_name( $menu_id ).'</b></li>';
								wp_nav_menu(
									array(
										'container'      => '',
										'items_wrap'     => '%3$s',
										'show_toggles'   => true,
										'theme_location' => $menu_id ,
									)								
								);
								?>
							</ul>
							<?php	
							}
						}
						*/
						?>
					<?php
				}
				?>



	</div><!-- .menu-modal-inner -->

</div><!-- .menu-modal -->
