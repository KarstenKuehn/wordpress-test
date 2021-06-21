<?php
/* 
	Template Name: Pressetermine Details
*/

get_header();
?>
<div class="main news_details">
<?php
if(get_the_post_thumbnail_url()){
		$img=get_the_post_thumbnail_url();
}
else{
	$img = '/wp-content/uploads/2021/06/SpielbankenBayern_allgemeines-PM-Motiv.png';
}
echo '<div class="bg-image" style="background-image:url(\''.$img.'\');"/><div class="hero-image-stairway"></div></div>';
echo '<h1>'.get_the_title().'</h1>';
$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
echo $html;


$category = get_the_category()[0]->slug;

if ($category == 'news')
{
	@include_once('news-list.php');
}
if ($category == 'events' || $category == 'veranstaltungen')
{
	@include_once('events-list.php');
}
?>
</div>
<?php get_footer(); 