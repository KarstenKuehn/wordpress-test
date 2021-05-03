<?php
/* 
	Template Name: Events Template
*/

get_header();


$args = array(
        'posts_per_page' => 5,
        'category'       => array(7,8),
        'post_status'    => 'publish',
    	'sort_order' 	 => 'desc'
    );

$posts = get_posts($args);

foreach ($posts as $key => $post) 
{
	echo '<h2>'.$post->post_title.'</h2>';
	echo '<p>'.$post->post_content.'</p>';
}






?>