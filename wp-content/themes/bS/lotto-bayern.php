<?php
/* 
	Template_x Name: LottoBayern Übersicht
*/

get_header();
?>

<div class="main">
<?php
  $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
echo $html;
?>

</div>

    <!-- Initialize Swiper -->
    <script>

var thumbs_arr = document.querySelector(".thumb")

var thumbs_html='';

//var thumbs_div= document.querySelector(".thumbs");
var thumbs_div= document.querySelector(".swiper-container.gallery-thumbs .swiper-wrapper");

var divs = document.querySelectorAll('.thumb'), i;

for (i = 0; i < divs.length; ++i) {
  divs[i].style.color = "white";
  thumbs_html+=divs[i].innerHTML;
}

thumbs_div.innerHTML += thumbs_html;

        var galleryThumbs = new Swiper('.gallery-thumbs', { 
            direction: 'horizontal', 
        spaceBetween: 24,
        slidesPerView: 3,
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

    </script>
<?php get_footer(); 