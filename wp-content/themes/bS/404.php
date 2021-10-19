<?php
/*
Template Name: 404 Template
*/
get_header();
?>
<main id="maincontent">
    <div class="main">
        <?php
            $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
            echo $html;
        ?>
        </div>
    </main>
<?php
get_footer();
