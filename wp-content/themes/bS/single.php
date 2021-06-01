<?php
/* 
	Template Name: Pressetermine Details
*/

get_header();
?>
<div class="main news_details">
<?php
echo '<h1>'.get_the_title().'</h1>';
$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
echo $html;
?>
</div>
<?php
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

<?php get_footer(); 