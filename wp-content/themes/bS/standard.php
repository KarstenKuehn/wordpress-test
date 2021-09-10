<?php
/* 
  Template Name: Standard Text Template
*/

get_header();
?>
<main id="maincontent">
    <div class="main standard">

        <?php
            if(get_the_post_thumbnail_url()!='')
            {
               // echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
            }
          ?>
      <?php
          $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
          echo $html;
      ?>
    </div>
</main>

<?php
get_footer(); 
