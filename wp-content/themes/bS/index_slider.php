<?php
/* 
	Template Name: Index-Slider Template
*/
get_header();

$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
?>
    <main id="maincontent">
        <div class="main">
            <?php echo $html; ?>
        </div>
    </main>
<?php get_footer(); ?>