<?php
/* 
	Template Name: Pressemitteilungen Übersicht
*/

get_header();
?>

<div class="main news_feed">
<?php

$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
#echo $html;


echo '<div class="height50"></div>
<h1>Pressemitteilungen</h1>';


$args = array(
        'category'       => array(10,9),
    	'sort_order' 	 => 'desc',
    	'posts_per_page'   => -1,
    );
$posts = get_posts($args);

?>

<?php

$year = 2021;

foreach ($posts as $key => $post) 
{
	$date = DateTime::createFromFormat('d.m.y', @get_field('datum'))->format('Y-m-d');
	if (strlen($post->post_title) > 1)
	{
		$img = '/wp-content/uploads/2021/06/news-fallback.png';
		if (strlen(get_the_post_thumbnail_url()) > 0)
		{
			$img = get_the_post_thumbnail_url();
		}
		
		$pages[] = array(
			'ID' => $post->ID,
			'post_title' => $post->post_title,
			'date' => $date,
			'excerpt'	=> substr(get_the_excerpt($post->ID),0 ,100),
			'link'		=> get_permalink(),
			'category'	=> get_the_category()[0]->name,
			'thumb'		=> $img,

		);
		$years[] = date('Y',strtotime($date));
	}
}
$years = array_unique($years);
?>

<section>
<div class="events_header">
<select>

<?php

function sortDesc( $a, $b ) {
	if (isset($b["date"]) && isset($a["date"]))
	{
		return strtotime($b["date"]) - strtotime($a["date"]);	
	} 
}function sortAsc( $a, $b ) {
	if (isset($b["date"]) && isset($a["date"]))
	{
		return strtotime($a["date"]) - strtotime($b["date"]);	
	} 
}

$selectedYear = date('Y');

foreach($years as $key => $year)
{
	if ($year == $selectedYear)
	{
		echo '<option selected>'.$year.'</option>';
	}
	else
	{
		echo '<option>'.$year.'</option>';
	}
	
}


?>
</select>

</div>
<div class="news">


<?php

usort($pages, "sortDesc");

$i = 1;
foreach ($pages as $key => $post) 
{
	if (isset($post['date']) && isset($post['excerpt']) && isset($post['link']) && isset($post['category']) )
	{
		if (preg_match('@'.$year.'@',$post['date']))
		{
			if ($i++ <= 6)
			{
				echo '<div class="news_container active">';	
			}
			else
			{
				echo '<div class="news_container">';
			}
			echo '<div class="bg-image" style="background-image:url(\''.$post['thumb'].'\');"/></div>';
			echo '<div class="news_frame">';
			echo date('d.m.y',strtotime($post['date']));
			echo '<h2>'.$post['post_title'].'...'.'</h2>';
			echo '<p>'.$post['excerpt'].'[...]</p>';
			echo '</div>';
			echo '<a href="'.$post['link'].'">'.$post['category'].'<span class="material-icons">east</span></a>';
			echo '</div>';
		}
	}
}

?>
<button onclick="showAllNews()">+ mehr laden</button>
</div>
</section>
</div>
<script>function showAllNews(){var e,s=document.getElementsByClassName("news_container");for(e=0;e<s.length;e++)s[e].classList.add("active")}</script>

<?php get_footer(); 