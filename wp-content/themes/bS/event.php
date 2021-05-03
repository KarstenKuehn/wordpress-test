<?php
/* 
	Template Name: Single Event Template
*/

get_header();
?>


<div class="main">
	
</div>
<?php
		$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
		echo $html;
?>

<?php get_footer(); ?>

<?php



?>