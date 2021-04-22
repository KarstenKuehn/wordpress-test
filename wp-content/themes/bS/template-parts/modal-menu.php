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

<?php 
   // the query
   $the_query = new WP_Query( array(
     'category_name' => 'allgemein',
      'posts_per_page' => 3,
   )); 
?>

<?php
	$name_of_menu = 'Hauptnaviagtion';
	echo haupt_menu($name_of_menu,'m');	
	echo getArticelMenu($name_of_menu,'m');			
	echo getSubMenu($name_of_menu,'m');	
?>

	</div><!-- .menu-modal-inner -->
</div><!-- .menu-modal -->
