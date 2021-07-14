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
        a11y: {
          prevSlideMessage: 'Vorheriger Slide',
          nextSlideMessage: 'Nächster Slide',
    firstSlideMessage: 'Dies ist der erste Slide.',
    lastSlideMessage: 'Dies ist der letzte Slide.',
    paginationBulletMessage: 'Gehe zu slide {{index}}',          
        },
      });
    </script>



    <script>
        var galleryTop = new Swiper('.gallery-main', { 
            direction: 'horizontal',

        pagination: {
          el: ".swiper-pagination.teaser",
          clickable: true,
        },
       // centeredSlides: true,
            effect:'slide',
        spaceBetween: 24,
        navigation: {
          nextEl: ".swiper-button-next.teaser",
          prevEl: ".swiper-button-prev.teaser",
        }, 

     breakpoints: {
        1100: {
       slidesPerView: 6,

        slidesPerGroup: 1,
       spaceBetween: 24
      },
        900: {
       slidesPerView: 4,
       spaceBetween: 24,
        centeredSlides: false,
      }, 
      768: {
       slidesPerView: 3,
       spaceBetween: 24,
        centeredSlides: false,
      }, 
    },

            });
    </script>

<?php seo_structuredData();?>