<?php
/* 
	Template Name: Index-Slider Template
*/
get_header(); 
?>

<div class="main">
<?php

$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());

echo $html;

  //echo get_my_content();
?>
</div>

<?php get_footer(); ?>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".teaserSwiper", {
        cssMode: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",

          clickable: true,
        },
        mousewheel: true,
        keyboard: true,
      });
    </script>



    <script>
        var galleryTop = new Swiper('.gallery-main', { 
            direction: 'horizontal',

        pagination: {
          el: ".swiper-pagination.teaser",
          clickable: true,
        },
            effect:'slide',
            slidesPerView: 4,
        spaceBetween: 24,
        navigation: {
          nextEl: ".swiper-button-next.teaser",
          prevEl: ".swiper-button-prev.teaser",
        }, 
            });
    </script>

<?php seo_structuredData();?>