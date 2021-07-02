<?php
/* 
	Template Name: Pressetermine Details
*/

get_header();
?>
<div class="main news_details">
<?php

$main_cat = '';
$sub_cat = '';
$cat = get_the_category();

$sub_cat_display='';

$news_date='';

$news_date = DateTime::createFromFormat('d.m.y', @get_field('datum'))->format('d.m.Y');

        foreach ($cat as $key => $value) {
        	if($value->category_parent==0)
        	{
        		$main_cat = $value->name;
        	}
        	if($value->category_parent<>0)
        	{
        		$sub_cat = $value->slug;
                        $sub_cat_display=$value->name;
        	}        	
       }  



$category = $cat[0]->slug;
if($sub_cat_display=='')
{
        $sub_cat_display= $cat[0]->name;
}

if(get_the_post_thumbnail_url()){
		$img=get_the_post_thumbnail_url();
}
else{


            $img='/wp-content/uploads/2021/06/SpielbankenBayern_allgemeines-PM-Motiv.png';
            if($sub_cat=='unternehmen-news')
            $img='/wp-content/uploads/2021/06/Presse-Unternehmens-News_2000x1100.jpg';
            if($sub_cat=='gewinner-news')
            $img='/wp-content/uploads/2021/06/Presse-News_Gewinnernews_2000x1100.jpg'; 
}

echo '<div class="bg-image" style="background-image:url(\''.$img.'\');"/><div class="hero-image-stairway"></div></div>';

?>


<section class="section-left hews-head"><div class="back"><a href="/presse-news/pressemitteilungen/" class="home"><span class="material-icons">arrow_back_ios</span> Zurück zur Übersicht</a> </div><div class="detail_info"><?php echo $sub_cat_display; ?> vom <?php echo $news_date; ?></div></section>
<?php
echo '<h1>'.get_the_title().'</h1>';


$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
echo $html;

/*


if ($category == 'news')
{
	@include_once('news-list.php');
}
if ($category == 'events' || $category == 'veranstaltungen')
{
	@include_once('events-list.php');
}

*/

?>
</div>
<?php get_footer(); 