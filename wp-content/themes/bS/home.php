<?php
get_header();
?>
<main>
    <div class="main">
    <?php
            echo '<h1>'.get_the_title().'</h1>';
            $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
            echo $html;
    ?>
    </div>
</main>
<?php get_footer(); ?>
