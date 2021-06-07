<?php
/* 
	Template Name: Spielbanken Übersicht
*/

get_header();
?>

<style type="text/css">

.swiper-button-next:after, .swiper-button-prev:after {
	color: #fff;
}

.swiper-slide{
	text-align: center;
}

.gallery-thumbs .swiper-pagination {
    position: relative!important;
     bottom: 8px!important; 
}


.gallery-thumbs .swiper-slide{
	border: 2px solid #E3E5ED; 

        opacity: 0.4;
}
.gallery-thumbs .swiper-slide-thumb-active{
	border: 2px solid red; 

        opacity: 1;
}

.gallery-thumbs .swiper-wrapper
{
	display: none
}


	.gallery-main .text{
		color: #091B30;
		margin-bottom: -64px;
	}

	.gallery-main .text h3{
		color: #f2f2f2;
	}

@media(min-width:768px)
{

	.gallery-thumbs
	{
		max-width: 1224px;
		margin: auto;
/*		height: 112px;*/
		padding: 24px; 
		top: -80px;
		background-color: #fff;
	}


	.gallery-thumbs .swiper-wrapper
	{
		display: flex;
		height: 112px;
	}

	.gallery-main .text{
		text-align: center;
		bottom: 172px;
		top: unset;
		height: auto;
		color: #f2f2f2;
	}
}

</style>
<div class="gallery-container">
  <div class="swiper-container gallery-main">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide1/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide1/600/300" alt="slide1"></div>
		<div class="text"><h3>test1</h3><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p><a class="my-block-button" href="/">zum Artikel</a></div>

      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide2/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide2/600/300" alt="slide2"></div>
		<div class="text"><h3>test2</h3><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p><a class="my-block-button" href="/">zum Artikel</a></div>
      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide3/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide3/600/300" alt="slide3"></div>
		<div class="text"><h3>test3</h3><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p><a class="my-block-button" href="/">zum Artikel</a></div>

      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide5/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide5/600/300" alt="slide4"></div>
		<div class="text"><h3>test4</h3><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p><a class="my-block-button" href="/">zum Artikel</a></div>

      </div>

      <!--
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide5/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide5/600/300" alt="slide5"></div>
		<div class="text">test5</div>

      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide6/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide6/600/300" alt="slide6"></div>
		<div class="text">test6</div>

      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide7/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide7/600/300" alt="slide7"></div>
		<div class="text">test7</div>

      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide8/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide8/600/300" alt="slide8"></div>
		<div class="text">test8</div>

      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide9/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide9/600/300" alt="slide9"></div>
		<div class="text">test9</div>

      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide10/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide10/600/300" alt="slide10"></div>
		<div class="text">test10</div>
-->
      </div>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
  <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
      <div class="swiper-slide">		
      	<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide1/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide1/600/300" alt="slide1"></div>
		<div class="text">test1</div></div>
      <div class="swiper-slide">		
      	<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide2/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide1/600/300" alt="slide2"></div>
		<div class="text">test2</div></div>
      <div class="swiper-slide"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide3/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide3/600/300" alt="slide3"><div class="text">test3</div></div>
      <div class="swiper-slide"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide4/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide4/600/300" alt="slide4"><div class="text">test4</div>
      </div>
<!--      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide5/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide5/600/300" alt="slide5"></div>
		<div class="text">test5</div>
      </div>
      <div class="swiper-slide"><div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide6/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide6/600/300" alt="slide6"></div>
		<div class="text">test6</div>
      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide7/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide7/600/300" alt="slide7"></div>
		<div class="text">test7</div>
      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide8/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide8/600/300" alt="slide8"></div>
		<div class="text">test8</div>
      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide9/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide9/600/300" alt="slide9"></div>
		<div class="text">test9</div>
      </div>
      <div class="swiper-slide">
		<div class="my-block-image"><div class="teaser_image_div" style="background-image:url(https://picsum.photos/seed/slide10/600/300)"></div><img class="teaser_image" src="https://picsum.photos/seed/slide10/600/300" alt="slide10"></div>
		<div class="text">test10</div>
      </div>
  -->
    </div>


<div class="swiper-pagination test desktop_hidden"></div>

  </div>
</div>




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
  <div class="swiper-pagination standorte desktop_hidden"></div>
    </div>
    <div class="swiper-button mobile_hidden">
      <div class="swiper-button-next standorte"></div>
      <div class="swiper-button-prev standorte"></div>
  </div>

</section>

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
          el: ".swiper-pagination.test",
          clickable: true,
        },
            effect:'slide',
        spaceBetween: 24,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: { swiper: galleryThumbs, }, 
            });




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