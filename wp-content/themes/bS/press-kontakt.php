<?php
/* 
	Template Name: Pressekontakt

	This is the template for the single "Presse & News" articles
*/

get_header();

?>




<div class="main">
<?php
		
		echo '<div class="height50"></div><h1>'.get_the_title().'</h1>';


		echo @get_field('name').'<br>';
		echo @get_field('e-mail').'<br>';
		echo @get_field('telefon').'<br>';
?>
</div>
<?php get_footer(); ?>
