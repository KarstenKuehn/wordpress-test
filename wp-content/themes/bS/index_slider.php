<?php
/* 
	Template Name: Index-Slider Template
*/
get_header(); 
$column_arr   = array('slide_img','slide_subline','slide_headline_zeile1','slide_headline_zeile2','slide_cta_btn_url' );
$slide_count  = 0;

/*
  1. Mindestens 1 Slide definiert
  2. Slide soll mindestens slide_img enthalten


$slide_html='';
for ($i=1; $i <= 3; $i++) 
{ 
  $field = get_field_object('slide_item'.$i);
  $slide_ok = isset($field['value']['slide_img']) && !empty($field['value']['slide_img']);
  if($slide_ok)
  {
    $slide_count++;
    if( have_rows('slide_item'.$i) ):
    while( have_rows('slide_item'.$i) ): the_row();
      $slide_html.='<div class="mySlides">';
        $slide_html.='<div class="my-block-image">';
          $image = get_sub_field('slide_img');
          $slide_html.='<img src="'.esc_url( $image['url'] ).'" alt="'.esc_attr( $image['alt'] ).'"/>';
        $slide_html.='</div>';

        $slide_html.='<div class="text">';

          $slide_html.='
          <span class="my-block-title">'.get_sub_field('slide_subline').'</span>
          <span class="my-block-text">'.get_sub_field('slide_headline_zeile1').' </span>
          <span class="my-block-text">'.get_sub_field('slide_headline_zeile2').'</span>';

        $link = get_sub_field('slide_cta_btn_url');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';

          $slide_html.='<a class="my-block-button" href="'.esc_url( $link_url ).'" target="'.esc_attr( $link_target ).'">'.esc_html( $link_title ).'</a>';
        endif;
        $slide_html.='</div>';
      $slide_html.='</div>';
    endwhile;

    endif;

  }

}    
  if($slide_count>0)
  {
    $slider='<div class="slideshow-container xx full">'.$slide_html.'</div>';
  }
  echo $slider;*/
?>

<div class="main">
<?php
/*
the_post();
the_field('link1');
echo '<img src="';
the_field('image1');
echo '" />';
the_field('link2');
$image = get_field('image2');
echo '<img src="'. esc_url($image['url']).'" alt="'. esc_attr($image['alt']).'"/>';

the_field('link3');
$image = get_field('image3');
echo '<img src="'. esc_url($image['url']).'" alt="'. esc_attr($image['alt']).'"/>';



*/
$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());

echo $html;

  //echo get_my_content();
?>
</div>

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

      var slide_navi_node   = document.createElement("div");      
      slide_navi_node.setAttribute("id", "slide_navi_"+i);
      slide_navi_node.setAttribute("class", "slide_navi "+i);




      container.append(slide_navi_node);

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
/*
      container.append(prev); 
      container.append(next); */
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
      n_slides[i].style.display = "none";  
      dots[i].className = dots[i].className.replace(" active_dot", "");
  }
  n_slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active_dot";
}

/* accordion */

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<?php seo_structuredData();?>