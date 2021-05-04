<?php
/* 
	Template Name: Events Übersicht Template
*/

get_header();
?>



<div class="main">
<?php



$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());

echo '<div class="height50"></div>
<h1>Veranstaltungen & Termine</h1>';

$args = array(
        'posts_per_page' => 5,
        'category'       => array(7,8),
    	'sort_order' 	 => 'desc'
    );

// echo '<pre>';
// var_dump(get_posts($args));
// die;
$posts = get_posts($args);

echo '<div class="events_overview">
<p class="events_header">
<span class="mobile_hidden">';
if (count($posts) > 1)
{
	echo ''.count($posts).' Termine';
}
if (count($posts) == 0)
{
	echo 'Keine Termine';
}
if (count($posts) == 1)
{
	echo '1 Termin';
}
echo '</span></p>';
foreach ($posts as $key => $post) 
{

	echo '<a class="event_short" href="'.$post->guid.'">';
	echo '<span class="material-icons">east</span>';
	echo '<h2>'.$post->post_title.'</h2>';
	echo '<span>';
	@the_field('datum');
	echo '</span> | <span>';
	@the_field('ort');
	echo '</span> | <span>'.@get_the_category()[0]->cat_name.'</span';
	echo '</a>';
}
echo '</div>';

echo $html;

?>
</div>

<?php get_footer(); ?>

<?php



?>