<?php
/* 
	Template Name: Spielbanken Übersicht
*/

get_header();
?>
<div class="main">
	<?php
	echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
	$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
	echo $html;
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
    <div class="slideshow-container content-slider">
      <div class="swiper-wrapper">
		<?php
			foreach ($pages as $page):
				$page_image = get_the_post_thumbnail( $page->ID );
				echo '<div class="swiper-slide mySlides">';
				echo '<div class="my-block-image">';
				//echo 'Image';
				echo $page_image;
				echo '</div>';
				echo '<a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a>';
				//$excerpt = get_the_excerpt(0,20);

				echo '<div class="text cs">';
				echo '<span class="my-block-text">';
				echo $page->post_title;
				echo '</span>';
				echo '<span class="my-block-text">';
				echo wp_trim_words(strip_tags($page->post_content),10, ' […]'  );   	
				echo '</span>';
				echo '<a class="button_more" href="' . get_permalink($page->ID) . '"><span>Spielbanken '.$page->post_title.'</span><img class="icons" src="/wp-content/uploads/LB_Icons_export/cta_arrow.svg" alt="weiter" />';
				echo '</a>';
				echo '</div>';
				echo '</div>';
			endforeach;
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
	.text.cs{
		position: relative;
    padding:	16px;
    max-width: 100%

	}

	.mySlides img{
	    background: none;
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

object-fit: contain
}
</style>





<?php get_footer(); 