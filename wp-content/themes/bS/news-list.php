<div class="main news_feed">
<?php

    $catname = 'News';
    $category = get_category_by_slug($catname); 
    $cat_id = $category->term_id;
$args = array(
        'category'       => $cat_id,
    	'sort_order' 	 => 'desc',
    	'posts_per_page'   => -1
    );
$posts = get_posts($args);

?>

<?php
if(isset($_GET['selected_year']))
	$year = $_GET['selected_year'];
else

$year = date('Y');

foreach ($posts as $key => $post) 
{

    $sub_cat = $catname;
    $id = $post->ID;
    $cat = get_the_category($id);
    foreach ($cat as $key => $value) {

        if($cat_id == $value->category_parent)
        {
            $sub_cat = $value->name;
        }
    } 
	$date = DateTime::createFromFormat('d.m.y', @get_field('datum'))->format('Y-m-d');
	if (strlen($post->post_title) > 1)
	{
        $img='/wp-content/uploads/2021/06/SpielbankenBayern_allgemeines-PM-Motiv.png';
        if($sub_cat=='Unternehmen News')
        $img='/wp-content/uploads/2021/06/Presse-Unternehmens-News_2000x1100.jpg';
        if($sub_cat=='Gewinner News')
        $img='/wp-content/uploads/2021/06/Presse-News_Gewinnernews_2000x1100.jpg';
  		if (strlen(get_the_post_thumbnail_url()) > 0)
		{
			$img = get_the_post_thumbnail_url();
		}	
		$pages[] = array(
			'ID' => $post->ID,
			'post_title' => wp_trim_words($post->post_title,10, ' […]'  ), 
			'date' => $date,
			'excerpt'	=> substr(get_the_excerpt($post->ID),0 ,100),
			'link'		=> get_permalink(),
			'category'	=> get_the_category()[0]->name,
			'sub_category'  => $sub_cat,
			'thumb'		=> $img,

		);
		$years[] = date('Y',strtotime($date));
	}
}

$years = array_unique($years);
?>

<section>
<div class="events_header">
<select id="select_year">

<?php

/*
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
*/
//$selectedYear = date('Y');

$selectedYear = $year;

foreach($years as $key => $year_select)
{
	if ($year_select == $selectedYear)
	{
		echo '<option selected>'.$year_select.'</option>';
	}
	else
	{
		echo '<option>'.$year_select.'</option>';
	}
	
}


?>
</select>

</div>
<!-- spalten_3 || spalten_2 -->
<div class="news spalten_3">


<?php

usort($pages, "sortDesc");
$i = 1;
foreach ($pages as $key => $post) 
{
	if (isset($post['date']) && isset($post['excerpt']) && isset($post['link']) && isset($post['category']) )
	{
		$search_text='';
		if (preg_match('@'.$year.'@',$post['date']) && ( (preg_match('@'.$search_text.'@',$post['post_title']))  || (preg_match('@'.$search_text.'@',$post['excerpt']))))
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
			echo '<h2>'.$post['post_title'].'</h2>';
			echo '<p>'.$post['excerpt'].'[...]</p>';
			echo '</div>';
			echo '<a href="'.$post['link'].'" class="list">'.$post['sub_category'].'<span class="material-icons">east</span></a>';
			echo '</div>';
		}
	}
}

?>
<button onclick="showAllNews()">+ mehr laden</button>
</div>
</section>
</div>
<script>
  var elem = document.getElementById('select_year');
  elem.addEventListener('change', Auswählen);

function Auswählen() {
    var x = document.getElementById('select_year').value;
var url = new URL(location.href);
var c = url.searchParams.get("selected_year");
location.href = location.pathname + "?selected_year=" + x;


}

	function showAllNews(){var e,s=document.getElementsByClassName("news_container");for(e=0;e<s.length;e++)s[e].classList.add("active")}</script>