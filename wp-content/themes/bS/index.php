<?php
/* 
	Template Name: Index Template
*/


get_header(); ?>



<?php echo minify_html(get_the_content()); ?>



<?php get_footer(); ?>