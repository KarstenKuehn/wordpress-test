<?php
/* 
	Template Name: Pressetermine Details
*/

get_header();
?>

<?php
echo '<div class="main event_detail">';
echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/></div>';
echo '<h1>'.get_the_title().'</h1>';
echo '<section>';
$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
echo $html;

echo '</section>';

$category = get_the_category()[0]->slug;

if ($category == 'news')
{
	@include_once('news.php');
}
if ($category == 'events' || $category == 'veranstaltungen')
{
	@include_once('events.php');
}
?>
</div>

<?php get_footer(); 