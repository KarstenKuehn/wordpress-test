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

$posts = get_posts($args);

$years = array();
foreach ($posts as $key => $post) 
{
	$years[] = '20'.preg_replace('@\d\d\.\d\d.@','',@get_field('datum'));
}
$years = array_unique($years);


echo '<div class="events_overview">
<div class="events_header">';

// -----------------------------------------------> YEAR FILTER
echo '<div class="mobile_width25 desktop_width10"><select class="event_year">';
$i = 0;
foreach ($years as $key => $year) 
{
	$i++;
	if ($i == 1)
	{
		echo '<option selected>'.$year.'</option>';
	}
	else
	{
		echo '<option>'.$year.'</option>';
	}

}
echo '</select></div>';
// -----------------------------------------------> YEAR FILTER
// -----------------------------------------------> TOPIC FILTER

echo '<div class="mobile_width25">
<select class="event_topic">
<option selected>Alle Themen</selected>
<option>Termine</selected>
<option>Veranstaltungen</selected>
</select></div>';
// -----------------------------------------------> TOPIC FILTER
echo '<div class="mobile_width25 desktop_width40">&nbsp;</div>';


echo '<div class="mobile_width25">
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
echo '</span></div></div>';
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