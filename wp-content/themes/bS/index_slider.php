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
<!--
<div class="slider">
<div class="item"><img src="/wp-content/uploads/2021/06/lottoBayern.png" alt="Logo"></div>
<div class="item"><img src="/wp-content/uploads/2021/06/lottoBayern.png" alt="Logo"></div>
<div class="item"><img src="/wp-content/uploads/2021/06/lottoBayern.png" alt="Logo"></div>
<div class="item"><img src="/wp-content/uploads/2021/06/lottoBayern.png" alt="Logo"></div>
<div class="item"><img src="/wp-content/uploads/2021/06/lottoBayern.png" alt="Logo"></div>
<div class="item"><img src="/wp-content/uploads/2021/06/lottoBayern.png" alt="Logo"></div>
<div class="item"><img src="/wp-content/uploads/2021/06/lottoBayern.png" alt="Logo"></div>
<div class="item"><img src="/wp-content/uploads/2021/06/lottoBayern.png" alt="Logo"></div>
<div class="item"><img src="/wp-content/uploads/2021/06/lottoBayern.png" alt="Logo"></div>
<div class="item"><img src="/wp-content/uploads/2021/06/lottoBayern.png" alt="Logo"></div>
<div class="item"><img src="/wp-content/uploads/2021/06/lottoBayern.png" alt="Logo"></div>
</div>
-->



    </main>
<?php get_footer(); ?>

<script>

/*

$('.slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 500,
  dots: true,
  arrows: true,
  centerMode: false,
  focusOnSelect: false,
  autoplay: false,
  autoplaySpeed: 2000,
   infinite: false,
  slide: 'div',
centerPadding: '0px',  
  responsive: [
      {
      breakpoint: 2000,
      settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
      }
      },
      {
      breakpoint: 900,
      settings: {
          slidesToShow: 3,
          slidesToScroll: 1
      }
      },
      {
      breakpoint: 768,
      settings: {
          slidesToShow: 2,
          slidesToScroll: 1
      }
      },
      {
      breakpoint: 480,
      settings: {
          slidesToShow: 1,
          slidesToScroll: 1
      }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
  ]
});

*/

</script>
    <!-- Initialize Swiper -->
<script>
   var swiper = new Swiper(".teaserSwiper", {
        //cssMode: true,
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
          prevSlideMessage: 'Vorheriges Bild',
          nextSlideMessage: 'Nächstes Bild',
    firstSlideMessage: 'Dies ist das erste Bild.',
    lastSlideMessage: 'Dies ist das letzte Bild.',
    paginationBulletMessage: 'Gehe zum Bild {{index}}',    
    slideLabelMessage:    'Bild {{index}} von {{slidesLength}}'   
        },
      });



    </script>

<!--
-->
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
        a11y: {
          prevSlideMessage: 'Vorheriges Bild',
          nextSlideMessage: 'Nächstes Bild',
    firstSlideMessage: 'Dies ist das erste Bild.',
    lastSlideMessage: 'Dies ist das letzte Bild.',
    paginationBulletMessage: 'Gehe zm Bild {{index}}',          
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
