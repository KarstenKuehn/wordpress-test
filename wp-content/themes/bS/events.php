<?php
/* 
	Template Name: Events Übersicht Template
*/

get_header();
?>



<div class="main">
<?php

$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());

echo '<h1>Veranstaltungen & Termine</h1>';

$args = array(
        'posts_per_page' => 5,
        'category'       => array(7,8),
        'post_status'    => 'publish',
    	'sort_order' 	 => 'desc'
    );

// echo '<pre>';
// var_dump(get_posts($args));
// die;


echo '<div>';

foreach (get_posts($args) as $key => $post) 
{
	echo '<a class="event_short" href="'.$post->guid.'">';
	echo '<span class="material-icons">east</span>';
	echo '<h2>'.$post->post_title.'</h2>';
	echo '<p>'.date('d.m.y',strtotime($post->post_date)).'</p>';
	echo ' | ';
	echo '<p>'.@get_the_category()[0]->cat_name.'</p>';
	echo '</a>';
}
echo '</div>';

echo $html;

?>
</div>

<?php get_footer(); ?>

<?php



?>