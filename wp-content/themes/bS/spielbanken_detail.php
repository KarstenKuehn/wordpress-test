<?php
/* 
	Template Name: Spielbanken Details
*/

get_header();
?>
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
    <h2 style="margin-top:120px">Standorte:</h2>
    <div class="slideshow-container content-slider spielbankendetails">
      <div class="swiper-wrapper">
      	
		<?php
			foreach ($pages as $page)
			{
				$url = get_the_post_thumbnail_url($page->ID);
				echo '<a href="' . get_permalink($page->ID) . '" class="swiper-slide mySlides" style="background-image:url(\''.$url.'\');">';
				echo get_the_title($page->ID);
				echo '</a>';
			}
		?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
</div>
    <!-- Swiper JS -->
	<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
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
    </script>

    <style type="text/css">
    	
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
	}

	.spielbankendetails .mySlides
	{
		  height: 257px;
  width: 392px;
  color: #FFF;
    background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover;
  padding: 16px 0 0 16px;
  color: #FFF;
  font-weight: 700;
  font-size: 16px;
  margin-bottom: 120px;
	}
.spielbankendetails .swiper-pagination
{
	display: none;
}
</style>





<?php get_footer(); 