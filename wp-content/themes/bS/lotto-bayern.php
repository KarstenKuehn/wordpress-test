<?php
/* 
	Template Name: LottoBayern Übersicht
*/

get_header();
?>

<div class="main">
<?php
  $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
echo $html;
?>

</div>
<?php get_footer(); 