<?php
/* 
	Template Name: Spielbanken Übersicht
*/

get_header();
?>
<div class="main spielbanken">
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
    <section class="full">
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
  <div class="swiper-pagination desktop_hidden"></div>
    </div>
    <div class="swiper-button mobile_hidden">
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
<?php get_footer(); 