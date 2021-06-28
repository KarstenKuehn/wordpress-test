<?php
/* 
  Template Name: Kontakt Template
*/

get_header();
?>
<!--
    <div class="swiper-container mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><div class="my-block-image"><img class="block_image" width="473" height="305" src="https://lottobayern.bluesummit.de/wp-content/uploads/2021/04/slide1-1.png" data-src="https://lottobayern.bluesummit.de/wp-content/uploads/2021/04/slide1-1.png" alt="slide1"></div><div class="text"><h3 id="headline_h3_0" class="my-block-title">NEWS &amp; PRESSE</h3><span class="my-block-text">Unser neues&nbsp;</span><span class="my-block-text">Spielangebot 2021</span><a class="my-block-button" href="presse_news">zum Artikel</a></div></div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 9</div>
      </div>
      <div class="swiper-pagination_x"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

    </div>

-->
<div class="main standard">
  <?php
  echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"/><div class="hero-image-stairway"></div></div>';
  $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
  echo $html;
echo '</div>';


if(isset($_POST['submit'])){
echo 'Ihre Nachricht wurde verschickt';

    $to = "tatjana.funkner@bluesummit.de"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
  /*    */
    }

?>

    <!-- Initialize Swiper -->
    <script>



var thumbs_arr = document.querySelector(".thumb")

var thumbs_html='';

//var thumbs_div= document.querySelector(".thumbs");
var thumbs_div= document.querySelector(".swiper-container.gallery-thumbs .swiper-wrapper");

var divs = document.querySelectorAll('.thumb'), i;

if(divs.length>0)

{

for (i = 0; i < divs.length; ++i) {
  divs[i].style.color = "white";
  thumbs_html+=divs[i].innerHTML;
}

thumbs_div.innerHTML += thumbs_html;

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
          el: ".swiper-pagination.teaser",
          clickable: true,
        },
            effect:'slide',
        spaceBetween: 24,
        navigation: {
          nextEl: ".swiper-button-next.teaser",
          prevEl: ".swiper-button-prev.teaser",
        },
        thumbs: { swiper: galleryThumbs, }, 
            });


}


      var swiper = new Swiper(".teaserSwiper", {
        cssMode: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",

          clickable: true,
        },
        mousewheel: true,
        keyboard: true,
      });
    </script>


    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination_x",

          clickable: true,
        },
        mousewheel: true,
        keyboard: true,
      });
    </script>


<?php
get_footer(); 