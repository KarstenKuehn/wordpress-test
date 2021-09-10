<?php
/* 
	Template_x Name: Lotterien Übersicht
*/

get_header();
?>

<div class="main standard">
	<?php
	//echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
	$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
	echo $html;
  ?>

</div>
<?php
get_footer(); 