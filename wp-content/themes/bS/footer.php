<?php //wp_footer();?>

	<div class="footer-top footer-top-visible has-footer-menu has-social-menu">

		<nav aria-label="Social-Media-Links" class="footer-social-wrapper">

			<ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">

				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'social',
						'container'       => '',
						'container_class' => '',
						'items_wrap'      => '%3$s',
						'menu_id'         => '',
						'menu_class'      => '',
						'depth'           => 1,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
						'fallback_cb'     => '',
					)
				);
				?>

			</ul><!-- .footer-social -->

		</nav><!-- .footer-social-wrapper -->
	</div>
<?php
wp_nav_menu( array( 
    'theme_location' => 'footer-menu', 
    'container_class' => 'footer-menu' ) ); 
?>	


<script>


var slides    = document.getElementsByClassName("mySlides");
var dots_navi     = document.getElementById("dots");
var dots_html   = '';
dots_navi.innerHTML   = '';
for (i = 1; i <= slides.length; i++) {
  dots_html   = '<span class="dot" onclick="currentSlide('+i+')"></span>';
  dots_navi.innerHTML   += dots_html;
}

var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active_dot", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active_dot";
}
</script>
<?php footer();?>