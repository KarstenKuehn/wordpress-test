<?php
/* 
	Template Name: Standard Text Template
*/

get_header();
?>


<div class="main event_detail">
	<?php
	echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
	$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
	echo $html;
echo '</div>';


get_footer(); 