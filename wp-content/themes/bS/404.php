<?php
/*
Template Name: 404 Template
*/
get_header();
?>
<?php
//wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
?>
    <main>
        <div class="main">
            <?php
            $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
            echo $html;
            ?>
        </div>
    </main>
<?php
get_footer();
