<?php
/* 
	Template Name: Pressemitteilungen Übersicht
*/

get_header();
?>

<style type="text/css">
	
.news {
    display: grid;
    grid-gap: 24px;
    justify-content: space-between;
    grid: auto 1fr auto / repeat(3, 1fr)
}
.news_container {
    display: inline-grid;
    grid-template-rows: auto 1fr auto;
    width: 100%;
    margin: 0;
}
.news_container .news_frame{
    display: inline-grid;
    grid-template-rows: auto 1fr 1fr;
}
</style>


<div class="main news_feed">
<?php

$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
#echo $html;


echo '<div class="height50"></div>
<h1>Pressemitteilungen</h1>';


$args = array(
        'posts_per_page' => 5,
        'category'       => array(10,9),
    	'sort_order' 	 => 'desc'
    );
$posts = get_posts($args);

?>
<section>
<div class="events_header">


</div>
<div class="news">
<?php
foreach ($posts as $key => $post) 
{

	echo '<div class="news_container">';

	echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/></div>';
	echo '<div class="news_frame">';
	@the_field('datum');
	echo '<h2>'.$post->post_title.'</h2>';
	echo substr($post->post_content,0 ,100).'...';
	echo '</div>';
	echo '<a href="'.get_permalink().'">'.get_the_category()[0]->name.'<span class="material-icons">east</span></a>';
	echo '</div>';
}

?>
</div>
</section>
</div>

<?php get_footer(); 