<?php
/* 
	Template Name: Online Tischspiele
*/

get_header();
?>
<main id="maincontent">
    <div class="main tischspiele">
	<?php
	echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
	$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
	echo $html;

$args = array(
    'parent'       			=> 100,
    'posts_per_page'   => -1,
);
$pages = get_pages($args);
	?>

    <div class="swiper-container mySwiper content-slider">
      <div class="swiper-wrapper">
		<?php
			foreach ($pages as $page):
				$url = get_the_post_thumbnail_url($page->ID);
				echo '<div class="swiper-slide mySlides">';
				echo '<div class="my-block-image" style="background-image:url(\''.$url.'\')";>';
				echo '</div>';
				echo '<div class="text cs">';
				echo '<span class="my-block-text">';
				echo $page->post_title;
				echo '</span>';
				echo '<span class="my-block-text">';
				echo wp_trim_words(strip_tags($page->post_content),10, ' […]'  );   	
				echo '</span>';
				echo '<a class="button_more" href="' . get_permalink($page->ID) . '"><img class="icons" src="/wp-content/uploads/LB_Icons_export/cta_arrow.svg" alt="weiter" />';
				echo '</a>';
				echo '</div>';
				echo '</div>';
			endforeach;
		?>
      </div>
      <div class="swiper-button-next aa"></div>
      <div class="swiper-button-prev aa"></div>
      <div class="swiper-pagination aa desktop_hidden"></div>
    </div>



    <!-- Swiper
    <div class="slideshow-container content-slider">
      <div class="swiper-wrapper">
		<?php
			foreach ($pages as $page):
				$url = get_the_post_thumbnail_url($page->ID);
				echo '<div class="swiper-slide mySlides">';
				echo '<div class="my-block-image" style="background-image:url(\''.$url.'\')";>';
				echo '</div>';
				echo '<div class="text cs">';
				echo '<span class="my-block-text">';
				echo $page->post_title;
				echo '</span>';
				echo '<span class="my-block-text">';
				echo wp_trim_words(strip_tags($page->post_content),10, ' […]'  );   	
				echo '</span>';
				echo '<a class="button_more" href="' . get_permalink($page->ID) . '"><img class="icons" src="/wp-content/uploads/LB_Icons_export/cta_arrow.svg" alt="weiter" />';
				echo '</a>';
				echo '</div>';
				echo '</div>';
			endforeach;
		?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div> -->
</div>
</main>

    <!-- Swiper JS -->

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 16,
        slidesPerGroup: 1,
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 1,
      spaceBetween: 16
    },
    // when window width is >= 480px
    768: {
      slidesPerView: 2,
      spaceBetween: 16
    },
    // when window width is >= 640px
    900: {
      slidesPerView: 2,
      spaceBetween: 32
    },
      1110: {
      slidesPerView: 3,
      spaceBetween: 32
    },},
        pagination: {
          el: ".swiper-pagination.aa",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next.aa",
          prevEl: ".swiper-button-prev.aa",
        },
        a11y: {
          prevSlideMessage: 'Vorheriges Bild',
          nextSlideMessage: 'Nächstes Bild',
    firstSlideMessage: 'Dies ist das erste Bild.',
    lastSlideMessage: 'Dies ist das letzte Bild.',
    paginationBulletMessage: 'Gehe zum Bild {{index}}',          
        },
      });

/*


      var swiper = new Swiper(".slideshow-container", {
		slidesPerView: 3,
        spaceBetween: 30,   
        dots: true,   	
        pagination: {
          el: ".swiper-pagination",
          type: "fraction",
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

*/

    </script>




    <style type="text/css">





      .swiper-container {
        width: 100%;
        height: 100%;
        margin-bottom: 24px;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

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
        flex-direction: column;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }


    	
      .swiper-container {
        width: 100%;
        height: 100%;
        min-height: 300px;
      }
	.mySlides {
	    display: block;
	    border: 1px solid #E3E5ED; 
	    background-color: transparent;
	    height: 100%;
	    width: 600px;
	}
	.text.cs{
		position: relative;
    padding:	16px;
    max-width: 100%
    
	}
	.my-block-text:last-of-type
	{
		min-height: 3rem;
	}
.text.cs *{
    max-width: 100%}

a.button_more {
	width: auto;
	display: flex;
	justify-content: flex-end;
}

a.button_more, a.button_more span {
	font-size: 16px;
	line-height: 48px;
}

a.button_more img.icons {
	height: 16px;
	display: inline-block;
	width: auto;
	margin: auto 0 auto 16px;
}

.my-block-image{
height: 391px;
width: 100%;
object-fit: contain;
aspect-ratio:  600/491;
}






</style>

<?php get_footer(); 
