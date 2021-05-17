<?php
/* 
	Template Name: Pressekontakt

	This is the template for the single "Presse & News" articles
*/

get_header();

?>




<div class="main contact">
<?php

		


		echo '<div class="height50"></div><h1>'.get_the_title().'</h1>';
		echo '<section>';


$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
echo $html;


		echo @get_field('name').'<br>';
		echo @get_field('e-mail').'<br>';
		echo @get_field('telefon').'<br>';

		echo '</section>';
?>
</div>
<?php get_footer(); ?>
