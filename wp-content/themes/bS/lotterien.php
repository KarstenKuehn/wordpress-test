<?php
/* 
	Template_x Name: Lotterien Übersicht
*/

get_header();
?>

<div class="main standard">
	<?php
	echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
	$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
	echo $html;
  ?>

</div>



    <script>
        var galleryTop = new Swiper('.gallery-main', { 
            direction: 'horizontal',

        pagination: {
          el: ".swiper-pagination.teaser",
          clickable: true,
        },
            effect:'slide',
            slidesPerView: 3,
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
    paginationBulletMessage: 'Gehe zum Bild {{index}}',          
        }, 
            });

</script>

<!---->

<?php
get_footer(); 