<?php
/* 
  Template Name: Standard Text Template
*/

get_header();
?>
<main id="maincontent">
    <div class="main standard">
        <div class="site-header">
        <?php
            if(get_the_post_thumbnail_url()!='')
            {
                echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
            }
          ?>
        </div>
      <?php
          $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
          echo $html;
      ?>
    </div>
</main>
  <!-- Initialize Swiper -->
  <script>



var thumbs_arr = document.querySelector(".thumb")

var thumbs_html='';

//var thumbs_div= document.querySelector(".thumbs");
var thumbs_div= document.querySelector(".swiper-container.gallery-thumbs .swiper-wrapper");

var divs = document.querySelectorAll('.thumb'), i;

if(divs.length>0)

{

for (i = 0; i < divs.length; ++i) {
  divs[i].style.color = "white";
  thumbs_html+=divs[i].innerHTML;
}

thumbs_div.innerHTML += thumbs_html;

        var galleryThumbs = new Swiper('.gallery-thumbs', { 
            direction: 'horizontal', 
        spaceBetween: 24,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,           

            });
        var galleryTop = new Swiper('.gallery-main', { 
            direction: 'horizontal',

        pagination: {
          el: ".swiper-pagination.teaser",
          clickable: true,
        },
            effect:'slide',
        spaceBetween: 24,
        navigation: {
          nextEl: ".swiper-button-next.teaser",
          prevEl: ".swiper-button-prev.teaser",
        },
        thumbs: { swiper: galleryThumbs, }, 
            });


}


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
        var galleryTop = new Swiper('.slide-frame .gallery-main', { 
            direction: 'horizontal',

        pagination: {
          el: ".slide-frame .swiper-pagination.teaser",
          clickable: true,
        },
       // centeredSlides: true,
            effect:'slide',
        spaceBetween: 24,
        navigation: {
          nextEl: ".slide-frame .swiper-button-next.teaser",
          prevEl: ".slide-frame .swiper-button-prev.teaser",
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
<?php
get_footer(); 
