<?php
/* 
	Template Name: Index Template
*/
get_header(); ?>

<?php get_content(); ?>
<?php echo do_shortcode('[meinshortcode]'); ?>


<?php get_footer(); ?>
<?php seo_structuredData();?>