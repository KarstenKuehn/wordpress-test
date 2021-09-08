<?php
/* 
	Template Name: Pressemitteilungen Übersicht
*/

get_header();
?>
<main id="maincontent">
    <div class="main news_feed">
    <?php

    //echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
    
  //  echo '<section class="content_section bitv"><div class="modul"><h1 class="news_headline e_headline has-large-font-size">Aktuelle Pressemitteilungen und News</h1></div>';

    //echo '</section>';
    $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
    echo $html;

    @include_once('news-list.php');
    ?>
    </div>
</main>
<?php get_footer(); 
