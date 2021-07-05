<?php
/* 
	Template Name: Index-Slider Template
*/
get_header(); 
?>

<div class="main">

    <!-- Demo styles -->
    <style>
      .mySwiper {
        width: 100%;
        height: 100%;
        background: red;
        height: 300px;
        max-width: 1440px;
        padding : 24px 0;     



      }
      .mySwiper .swiper-wrapper{
        width: 100%;
        height: 100%;
        background: green;
        height: 300px;
        max-width: 1440px;
        padding : 24px 108px; 
        margin: auto;

    left: 108px;


    right: -108px;
    width: 100%;



      }
      .mySwiper .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: pink;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        max-width: calc(1224px / 3);
      }

      .mySwiper .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .mySwiper .swiper-button {
        background: pink;
      }

    </style>

    <div class="swiper-container mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">Slide 1</div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 9</div>
      </div>
      <div class="swiper-button-next swiper-button"></div>
      <div class="swiper-button-prev swiper-button"></div>
      <div class="swiper-pagination"></div>
    </div>

    <script>
      var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
                    effect:'slide',
        spaceBetween: 24,
        slidesPerView: 3,
        pagination: {
          el: ".swiper-pagination",
                    clickable: true,
        },
        mousewheel: true,
        keyboard: true,
      });
    </script>
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