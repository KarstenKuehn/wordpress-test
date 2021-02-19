<?php

function seo_structuredData()
{
    $structuredData_html 	= file_get_contents(get_template_directory().'/views/structured_data.blade.html');

	$page_data 				= page_data();
	$user_data 				= get_userdata($page_data->post_author);
	/*
echo get_the_author();
print_r($page_data );
echo '<hr>';
print_r(get_post());
echo '<hr>';
print_r(get_post_modified_time('Y-m-d H:i:s'));
echo '<hr>';
print_r(get_the_modified_author());
echo '<hr>';
*/
	$artikel_body = get_the_content().' test test-test test test\'test';
	$artikel_body_count_word = count(str_word_count(strip_tags($artikel_body),1,'-\'_'));
    // 1. structuredData Website
    $structuredData_html = str_replace(
    array(
        '{{language}}',
        '{{canonical}}',
        '{{title}}',
        '{{meta_description}}'
    ),
    array(
        'de',
        (strlen($page_data->canonical) > 0 ) ? $page_data->canonical : get_permalink(),
        (strlen($page_data->meta_title) > 0 ) ? $page_data->meta_title : get_the_title(),
        $page_data->meta_description
    ),
    $structuredData_html);

    // 2. structuredData Organization
    $structuredData_html = str_replace(
    array(
        '{{sociallinks}}',
        '{{Organization-Name}}',
        '{{Organization-Brand}}',
        '{{Organization-Slogan}}',
        '{{Organization-URL}}',
        '{{Organization-Logo}}'
    ),
    array(
        '["https://www.facebook.com/lottobayern","https://www.youtube.com/channel/UCvwAEnxdu6JHXujIW0AfjoQ","https://www.instagram.com/lottobayern/","https://twitter.com/lottobayern","https://de.linkedin.com/company/lotto-bayern"]',
        'Organization-Name',
        'Organization-Brand',
        'Organization-Slogan',
        'kontakt/kontakt-formular/',
        '/wp-content/uploads/2021/02/lotto_transparent.png'
    ),
    $structuredData_html);

    // 3. structuredData Artikel
    $structuredData_html = str_replace(
    array(
        '{{Article-Headline}}',
        '{{Article-alternativeHeadline}}',
        '{{Article-Image}}',
        '{{Article-Autor}}',
        '{{Article-Award}}',
        '{{Article-Editor}}',
        '{{Article-Genre}}',
        '{{Article-Keywords}}',
        '{{Article-WordCount}}',
        '{{Publisher-Name}}',
        '{{Publisher-Logo}}',
        '{{Article-URL}}',
        '{{MainEntityOfPage-URL}}',
        '{{Article-published}}',
        '{{Article-created}}',
        '{{Article-modified}}',
        '{{Article-Description}}',
        '{{Article-Body}}'

    ),
    array(
        get_the_title(),
        'Article-alternativeHeadline',
        '/wp-content/uploads/2021/02/lotto_small.png',
        $user_data->display_name,
        'Article-Award',
        'Article-Editor',
        'Article-Genre',
        'Article-Keywords',
        $artikel_body_count_word,
        'Publisher-Name',
        '/wp-content/uploads/2021/02/lotto_transparent.png',
        get_home_url(),
        'MainEntityOfPage-URL',
        get_the_date(),
        get_the_date(),
        get_post_modified_time('Y-m-d H:i:s'),
        $page_data->meta_description,
        $artikel_body
    ),
    $structuredData_html);

    //$structuredData_html = minify_html($structuredData_html);
    echo $structuredData_html;
}
