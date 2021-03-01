<?php

function seo_structuredData()
{

    $page_data              = page_data();
    $user_data              = get_userdata($page_data->post_author);

$html = get_the_content();



 preg_match_all( '@<h[1-6][\w|\W]*?</h[1-6]>@', $html, $_headings );


/** headings:

<h1>...
<h2>...
<h3>...


*/

    $structuredData_html 	= file_get_contents(get_template_directory().'/views/structured_data.blade.html');

	$artikel_body = ' test test-test test test\'test';
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
        'Article-Keywords',
        $artikel_body_count_word,
        'LottoBayern',
        '/wp-content/uploads/2021/02/lotto_transparent.png',
        get_home_url(),
        get_home_url(),
        get_the_date('Y-m-d H:i:s'),
        get_the_date('Y-m-d H:i:s'),
        get_post_modified_time('Y-m-d H:i:s'),
        $page_data->meta_description,
        $artikel_body
    ),
    $structuredData_html);
$listItem ='
<script type="application/ld+json">
{
"@context":"http://schema.org",
"@type":"ItemList",
"itemListElement":[';
$listItem .='
  {
  "@type":"ListItem",
  "position":1,
  "name" : "1.",
  "url":"/testseite-fuer-footer#1"
  },  {
  "@type":"ListItem",
  "position":2,
  "name" : "2.",
  "url":"/testseite-fuer-footer#2"
  }
';
$i=3;
foreach ($_headings[0] as $key => $value) {

preg_match_all( '@<([^\s]+).*?id="([^"]*?)".*?>(.+?)</\1>@', $value, $_html );
/*
print_r($value);
echo '<br>';
print_r($_html[1]);
echo '<br>';
print_r($_html[2]);
echo '<br>';
echo 'html_tag = '.$_html[1][0];
echo '<br>';
echo 'id = '.$_html[2][0];
echo '<br>';
echo 'value = '.$_html[3][0];
echo '<br>';

echo get_permalink( $page_data->ID).'#'.$_html[2][0];
    echo '<hr>';

*/

$listItem .='
  {
  "@type":"ListItem",
  "position":'.$i.',
  "name" : "'.$_html[3][0].'",
  "url":"'.get_permalink( $page_data->ID).'#'.$_html[2][0].'"
  },
';
$i++;
}

$listItem .='  ]
}</script>';
    //$structuredData_html = minify_html($structuredData_html);
    echo $structuredData_html;
echo $listItem;

}
