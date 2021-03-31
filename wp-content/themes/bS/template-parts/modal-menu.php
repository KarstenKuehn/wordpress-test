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

	<div class="menu-modal-inner modal-inner">

		<div class="menu-wrapper section-inner">

			<div class="menu-top">

				<button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
					<span class="toggle-text"><?php _e( 'Close Menu', 'twentytwenty' ); ?></span>
					<?php bs_the_theme_svg( 'cross' ); ?>
				</button><!-- .nav-toggle -->

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


				if ( has_nav_menu( 'expanded' ) ) {
					$expanded_nav_classes = '';

					if ( 'expanded' === $mobile_menu_location ) {
						$expanded_nav_classes .= ' mobile-menu';
					}

					?>

					<nav class="expanded-menu<?php echo esc_attr( $expanded_nav_classes ); ?>" aria-label="<?php echo esc_attr_x( 'Expanded', 'menu', 'twentytwenty' ); ?>" role="navigation">

						<ul class="modal-menu reset-list-style">
							<li><b>1.</b></li>
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

					</nav>

					<?php
				}

				if ( 'expanded' !== $mobile_menu_location ) {

					?>

					<nav class="mobile-menu" aria-label="<?php echo esc_attr_x( 'Mobile', 'menu', 'twentytwenty' ); ?>" role="navigation">

						<ul class="modal-menu reset-list-style">
						<?php



						if ( $mobile_menu_location ) {
						/*
							$m = wp_nav_menu(
								array(
									'container'      => '',
									'items_wrap'     => '%3$s',
									'show_toggles'   => true,
									'theme_location' => 'top-menu1',
  									'sub_menu'      => false,
								)
							);
						*/


echo '--------------------------- ';
//$menu_items = wp_get_nav_menu_object('top-menu1' );
$current_nav_item =  my_get_menu_item_name( 'top-menu1' );
//print_r($menu_items);
//$this_item = current( wp_filter_object_list( $menu_items, array( 'object_id' => get_queried_object_id() ) ) );
//echo $this_item->title;
echo $current_nav_item;
echo ' ---------------------------';

$args = array(
    'theme_location' => 'top-menu1', // the one used on register_nav_menus
    'submenu' => $current_nav_item , // could be used __() for translations
);

wp_nav_menu( $args );

						?>bbbb

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
						?>
					</nav>
					<?php
				}
				?>

			</div><!-- .menu-top -->

		</div><!-- .menu-wrapper -->

	</div><!-- .menu-modal-inner -->

</div><!-- .menu-modal -->
