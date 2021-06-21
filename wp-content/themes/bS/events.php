<?php
/* 
	Template Name: Pressetermine Übersicht
*/

get_header();

@include_once('events´-list.php');
?>



<div class="main events">
<?php



$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());

echo '<div class="height50"></div>
<h1>Pressetermine</h1>';

@include_once('events-list.php');
?>
</div>

<?php get_footer(); 