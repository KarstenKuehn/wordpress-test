<?php
/* 
	Template Name: Spielbanken Übersicht
*/

get_header();

  $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
echo $html;
?>
<style type="text/css">
  
</style>
<div class="main spielbanken">
	<?php

//  echo $html;
//	echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';


//$html='';  



//	echo '<div class="medium_x">'.$html.'</div>';
	$base_args = array(
    	'hierarchical' => 0
  	);
	if (has_children()):
    	$args = array(
      		'child_of' => $post->ID,
      		'parent' => $post->ID
    	);
  	else:
    	if (is_top_level()):
      		$args = array(
        		'parent' => $post->post_parent
      		);
    	else:
      		$args = array(
        		'parent' => 0
      		);
    	endif;
  	endif;
    $args = array_merge($base_args, $args);
    $pages = get_pages($args);
	?>
    <!-- Swiper
    <h2 style="margin-top:120px">Standorte</h2>
    <section class="full-limit">
    <div class="slideshow-container content-slider spielbanken">
      <div class="swiper-wrapper">
      	
		<?php
			$overall_id = get_the_ID();

			foreach ($pages as $page)
			{
				if ( $page->ID != $overall_id)
				{
				$page_image = get_the_post_thumbnail( $page->ID );
				$url = get_the_post_thumbnail_url($page->ID);
				echo '<div class="swiper-slide mySlides">';

				echo '<div class="slide_image" style="background-image:url(\''.$url.'\');"></div>';

				echo '<div class="text cs">';
				echo '<span class="my-block-text headline">';
				echo $page->post_title;
				echo '</span>';
				echo '<span class="my-block-text">';
				echo wp_trim_words(strip_tags($page->post_content),20, ' […]'  );   	
				echo '</span>';
				echo '<div class="button_more"><a href="' . get_permalink($page->ID) . '"><img class="icons" src="/wp-content/uploads/LB_Icons_export/cta_arrow.svg" alt="weiter" />';
				echo '</a></div>';
				echo '</div>';
				echo '</div>';

				}
			}
		?>
      </div>

    </div>  <div class="swiper-pagination standorte desktop_hidden"></div>
    <div class="swiper-button mobile_hidden">
      <div class="swiper-button-next standorte"></div>
      <div class="swiper-button-prev standorte"></div>
  </div>

</section> -->
</div>

    <!-- Initialize Swiper -->
    <script>

      var swiper = new Swiper(".slideshow-container", {
		slidesPerView: 1,
        spaceBetween: 24,   
        pagination: {
          el: ".swiper-pagination.standorte",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next.standorte",
          prevEl: ".swiper-button-prev.standorte",
        },

		 breakpoints: {
		    1100: {
		   slidesPerView: 2,
		   spaceBetween: 24
		  },
		    900: {
		   slidesPerView: 2,
		   spaceBetween: 24
		  }, 
		  768: {
		   slidesPerView: 2,
		   spaceBetween: 24
		  }, 
		},

      });

    </script>

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
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper,
        },
      });
    </script>
<?php get_footer(); 