<?php
/* 
	Template Name: Pressetermine Übersicht
*/

get_header();
?>



<div class="main events">
<?php



$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());

echo '<div class="height50"></div>
<h1>Pressetermine</h1>';

// --------------------------------------> START EVENTS


$args = array(
        'posts_per_page' => 5,
        'category'       => array(7,8),
    	'sort_order' 	 => 'desc'
    );

$posts = get_posts($args);
$output_posts = array();

foreach ($posts as $key => $post) 
{
	if (isset($_GET['etype']) && $_GET['etype'] == strtolower(get_the_category()[0]->cat_name))
	{
		$output_posts[] = $post;
	}
	
	if(	isset($_GET['eyear']) && $_GET['eyear'] == '20'.preg_replace('@\d\d\.\d\d.@','',@get_field('datum')) )
	{
		$output_posts[] = $post;
	}

	if(!isset($_GET['etype']) && !isset($_GET['eyear']))
	{
		$output_posts[] = $post;
	}
}



$years = array();
foreach ($output_posts as $key => $post) 
{
	$years[] = '20'.preg_replace('@\d\d\.\d\d.@','',@get_field('datum'));
}
$years = array_unique($years);


echo '<section class="events_overview">
<div class="events_header">';

// -----------------------------------------------> YEAR FILTER
echo '<div class="mobile_width25 desktop_width10"><select class="event_year" onchange="location = this.value;">';
$i = 0;
foreach ($years as $key => $year) 
{
	$i++;
	if ($i == 1)
	{
		echo '<option value="/presse-news/" selected>'.$year.'</option>';
	}
	else
	{
		echo '<option value="/presse-news/?eyear='.$year.'">'.$year.'</option>';
	}

}
echo '</select></div>';
// -----------------------------------------------> YEAR FILTER
// -----------------------------------------------> TOPIC FILTER

echo '<div class="mobile_width25">
	<select class="event_topic" onchange="location = this.value;">
	<option value="/presse-news/" ';
	if(!isset($_GET['etype']) && !isset($_GET['eyear']))
	{
		echo 'selected';
	}
echo ' >Alle Themen</option>
	<option value="/presse-news/?etype=termine" ';
	if(isset($_GET['etype']) && $_GET['etype'] == 'termine')
	{
		echo 'selected';
	}
echo ' >Termine</option>
	<option value="/presse-news/?etype=veranstaltungen"';
	if(isset($_GET['etype']) && $_GET['etype'] == 'veranstaltungen')
	{
		echo 'selected';
	}
echo ' >Veranstaltungen</option>
</select></div>';
// -----------------------------------------------> TOPIC FILTER
echo '<div class="mobile_width25 desktop_width40">&nbsp;</div>';


echo '<div class="mobile_width25">
<span class="mobile_hidden">';
if (count($output_posts) > 1)
{
	echo ''.count($output_posts).' Termine';
}
if (count($output_posts) == 0)
{
	echo 'Keine Termine';
}
if (count($output_posts) == 1)
{
	echo '1 Termin';
}
echo '</span></div></div>';

foreach ($output_posts as $key => $post) 
{
	
		echo '<a class="event_short" href="'.$post->guid.'">';
		echo '<span class="material-icons">east</span>';
		echo '<h2>'.$post->post_title.'</h2>';
		echo '<span>';
		echo @get_field('datum');
		echo '</span> | <span>';
		echo @get_field('ort');
		echo '</span> | <span>'.@get_the_category()[0]->cat_name.'</span>';
		echo '</a>';
}

echo '</section>';
// --------------------------------------> END EVENTS



#echo $html;

?>
</div>

<?php get_footer(); 