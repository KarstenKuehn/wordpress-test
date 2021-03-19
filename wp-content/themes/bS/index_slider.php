<?php
/* 
	Template Name: Index-Slider Template
*/
get_header(); ?>
<main>
<?php
	echo get_my_content();
?>
</main>
<?php get_footer(); ?>
<script>

var slideshow_container =   document.getElementsByClassName("slideshow-container");


  for (i = 0; i < slideshow_container.length; i++) {
    var container = slideshow_container[i];
    // definierte Slider
    var c_slides    = container.getElementsByClassName("mySlides");


    if(c_slides.length>0)
    {
      // Slider Pagination als Dots
      // Slider Navigation prev| next

      var dots_node   = document.createElement("div");
      
      dots_node.setAttribute("id", "dots_"+i);
      dots_node.setAttribute("class", "dots "+i);
      container.append(dots_node); 

      var prev = document.createElement('a'); 
      var prev_text = document.createTextNode("❮");
      prev.appendChild(prev_text);
      prev.setAttribute("class", "prev_slide");
      prev.setAttribute("onclick", "plusSlides("+i+",-1)");

      var next = document.createElement('a'); 
      var next_text = document.createTextNode("❯");
      next.appendChild(next_text);
      next.setAttribute("class", "next_slide");
      next.setAttribute("onclick", "plusSlides("+i+",+1)");

      container.append(prev); 
      container.append(next); 

    }

    var dots_navi     = document.getElementById("dots_"+i);
    dots_navi.innerHTML   = '';
    for (s = 1; s <= c_slides.length; s++) {
      slide = c_slides[s];
      //console.log(s);
      dots_html   = '<span class="dot" onclick="currentSlide('+i+','+s+')"></span>';
      dots_navi.innerHTML   += dots_html;
    } 

  // start with first Slide
  var slideIndex = 1;
  showSlides(i,slideIndex);
  }

function plusSlides(c,n) {
   console.log('plusSlides('+c+','+n+')');
  showSlides(c,slideIndex += n);
}

function currentSlide(c,n) {
   console.log('currentSlide('+c+','+n+')');
  showSlides(c,slideIndex = n);
}

function showSlides(c,n) {
  console.log('showSlides('+c+','+n+')');
  var container = document.getElementsByClassName("slideshow-container")[c];
  console.log(container);
  var i;
  var n_slides = container.getElementsByClassName("mySlides");
  var dots = container.getElementsByClassName("dot");
  if (n > n_slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = n_slides.length}

  console.log(slideIndex);

  for (i = 0; i < n_slides.length; i++) {
      n_slides[i].style.display = "none";  
      dots[i].className = dots[i].className.replace(" active_dot", "");
  }
  n_slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active_dot";
}



</script>
<?php seo_structuredData();?>