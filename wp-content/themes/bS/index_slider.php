<?php
/* 
	Template Name: Index-Slider Template
*/
get_header(); ?>
xxxx


<?php
	echo 'aaa'.get_my_content();
?>

<?php get_footer(); ?>
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
<?php seo_structuredData();?>