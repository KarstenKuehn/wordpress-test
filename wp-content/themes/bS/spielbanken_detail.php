<?php
/* 
	Template_x Name: Spielbanken Details
*/

get_header();
?>
<!--
	<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
-->

<div class="main spielbanken_details">
	<?php
	echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';

	$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
	echo '<div class="medium">'.$html.'</div>';
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
    <!-- Swiper -->
    <h2 style="margin-top:120px">Standorte</h2>    
    <section class="full-limit">
    <div class="slideshow-container content-slider spielbankendetails">
      <div class="swiper-wrapper">
      	
		<?php
			$overall_id = get_the_ID();

			foreach ($pages as $page)
			{
				if ( $page->ID != $overall_id)
				{
					$url = get_the_post_thumbnail_url($page->ID);
					echo '<a href="' . get_permalink($page->ID) . '" class="swiper-slide mySlides" style="background-image:url(\''.$url.'\');">';
					echo get_the_title($page->ID);
					echo '</a>';
				}
			}
		?>
      </div>

    </div>
  <div class="swiper-pagination desktop_hidden"></div>    <div class="swiper-button mobile_hidden">
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
  </div>

</section>
</div>
    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".slideshow-container", {
		slidesPerView: 1,
        spaceBetween: 24,   
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },

     breakpoints: {
        1440: {
       slidesPerView: 3,
       spaceBetween: 24
      },
        1100: {
       slidesPerView: 3,
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
<style>

</style>



<?php get_footer(); 