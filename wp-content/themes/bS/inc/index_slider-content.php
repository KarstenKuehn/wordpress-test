<?php

function seo_index_slider()
{

    $page_data              = page_data();
    $user_data              = get_userdata($page_data->post_author);
    $index_slider_html 	= file_get_contents(get_template_directory().'/views/index_slider.blade.html');
    //echo $index_slider_html;
    $arrow = bs_get_theme_svg( 'arrow-right','ui','white' );
    $index_slider_html = str_replace('--arrow--',$arrow , $index_slider_html);
    return $index_slider_html;

}
