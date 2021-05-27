<?php
/* 
	Template Name: Spielbanken
*/

get_header();
?>

<?php
echo '<div class="main event_detail">';
echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
#echo '<h1>'.get_the_title().'</h1>';
$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
echo $html;

?>
</div>



<style type="text/css">
	.your-class{
background-color: gray!important;	

	}
.slideshow-container.column_2, .slideshow-container.column_3 {
background-color: gray!important;
margin-bottom: 49px!important;
    overflow: hidden;
}



.text {
    position: relative;
}

.slide_navi {
    position: absolute;
    bottom: 0;
    top: calc(100% - 50px);
    height: 50px;
	max-width: 2000px;
}

.prev_slide, .next_slide {
	background-color: #1F5DA6;
}


@media(min-width:768px)
{

.slideshow-container .wp-block-group__inner-container
{
    max-width: 1224px;
    margin: auto;
    padding-bottom: 50px;
}

.column_2 .mySlides  ,.column_3 .mySlides  {
margin: 0 12px;
display: inline-block;
position: absolute;

}

.column_2 .mySlides  {
width: calc(100% / 2 - 24px);
max-width: 588px;
}

.column_3 .mySlides  {
width: calc(100% / 3 - 24px);
}
}


</style>







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
      dots_node.setAttribute("class", "desktop_hidden dots "+i);
      container.appendChild(dots_node); 

      var slide_navi_node   = document.createElement("div");      
      slide_navi_node.setAttribute("id", "slide_navi_"+i);
      slide_navi_node.setAttribute("class", "slide_navi "+i);




      container.appendChild(slide_navi_node);

      var prev = document.createElement('a'); 
/*
      var prev_text = document.createTextNode("❮");
*/
     
      var prev_text =  document.createElement("span"); 
      prev_text.setAttribute("class", "material-icons");
      var p_text = document.createTextNode("arrow_back_ios_new");

      prev_text.appendChild(p_text);
      prev.appendChild(prev_text);


      prev.setAttribute("class", "prev_slide");
      prev.setAttribute("onclick", "plusSlides("+i+",-1)");

      var next = document.createElement('a'); 
/*
      var next_text = document.createTextNode("❯");
*/
      var next_text =  document.createElement("span"); 
      next_text.setAttribute("class", "material-icons");
      var n_text = document.createTextNode("arrow_forward_ios");

      next_text.appendChild(n_text);

      next.setAttribute("class", "next_slide");
      next.setAttribute("onclick", "plusSlides("+i+",+1)");
      next.appendChild(next_text);
      slide_navi_node.appendChild(prev);slide_navi_node.appendChild(next);
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
  //console.log('plusSlides('+c+','+n+')');
  showSlides(c,slideIndex += n);
}

function currentSlide(c,n) {
  //console.log('currentSlide('+c+','+n+')');
  showSlides(c,slideIndex = n);
}

function showSlides(c,n) {
  //console.log('showSlides('+c+','+n+')');
  var container = document.getElementsByClassName("slideshow-container")[c];
  //console.log(container);
  var i;
  var n_slides = container.getElementsByClassName("mySlides");
  var dots = container.getElementsByClassName("dot");
  if (n > n_slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = n_slides.length}
  //console.log(slideIndex);

  for (i = 0; i < n_slides.length; i++) {
      n_slides[i].style.display = "inline-block";  
      dots[i].className = dots[i].className.replace(" active_dot", "");
  }
  n_slides[slideIndex-1].style.display = "inline-block";  
  n_slides[slideIndex].style.display = "inline-block";  

  n_slides[slideIndex-1].style.position = "relative";  
  n_slides[slideIndex].style.position = "relative"; 

  dots[slideIndex-1].className += " active_dot";
}
</script>
<?php get_footer(); 