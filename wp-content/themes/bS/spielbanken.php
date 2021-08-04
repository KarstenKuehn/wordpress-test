<?php
/* 
	Template Name: Spielbanken Übersicht
*/

get_header();

$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());

?>
<main>
    <div class="main">
        <?php echo $html; ?>
    </div>
</main>


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

            a11y: {
                prevSlideMessage: 'Vorheriges Bild',
                nextSlideMessage: 'Nächstes Bild',
                firstSlideMessage: 'Dies ist das erste Bild.',
                lastSlideMessage: 'Dies ist das letzte Bild.',
                paginationBulletMessage: 'Gehe zum Bild {{index}}',
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

                a11y: {
                    prevSlideMessage: 'Vorheriges Bild',
                    nextSlideMessage: 'Nächstes Bild',
                    firstSlideMessage: 'Dies ist das erste Bild.',
                    lastSlideMessage: 'Dies ist das letzte Bild.',
                    paginationBulletMessage: 'Gehe zum Bild {{index}}',
                },
                thumbs: { swiper: galleryThumbs, },
            });



        }
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

            a11y: {
                prevSlideMessage: 'Vorheriges Bild',
                nextSlideMessage: 'Nächstes Bild',
                firstSlideMessage: 'Dies ist das erste Bild.',
                lastSlideMessage: 'Dies ist das letzte Bild.',
                paginationBulletMessage: 'Gehe zum Bild {{index}}',
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
<?php get_footer(); 
