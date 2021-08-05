<?php
/* 
	Template Name: Pressemitteilungen Übersicht
*/

get_header();
?>
<main id="maincontent">
    <div class="main news_feed">
    <?php

    echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
    echo '<div class="height50"></div>
    <h1>Aktuelle Pressemitteilungen und News</h1>';

    $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
    echo $html;

    @include_once('news-list.php');
    ?>
    </div>
</main>
<?php get_footer(); 
