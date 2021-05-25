<?php
/* 
	Template Name: Spielbanken
*/

get_header();
?>

<?php
echo '<div class="main event_detail">';
echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
echo '<h1>'.get_the_title().'</h1>';
$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
echo $html;

?>
</div>

<?php get_footer(); 