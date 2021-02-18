<?php

function seo_structuredData()
{
    $structuredData_html = file_get_contents(get_template_directory().'/views/structured_data.blade.html');

    //$structuredData_html = 'aaa';

    $structuredData_html = str_replace(
    array(
        '{{language}}',
        '{{canonical}}',
        '{{title}}',
        '{{meta_description}}',
        '{{sociallinks}}',
        '{{Organization-Name}}',
        '{{Organization-Brand}}',
        '{{Organization-Slogan}}',
        '{{Organization-URL}}',
        '{{Organization-Logo}}',
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
        'de',
        (strlen($page_data->canonical) > 0 ) ? $page_data->canonical : get_permalink(),
        (strlen($page_data->meta_title) > 0 ) ? $page_data->meta_title : get_the_title(),
        $page_data->meta_description,
        '["https://www.facebook.com/lottobayern","https://www.youtube.com/channel/UCvwAEnxdu6JHXujIW0AfjoQ","https://www.facebook.com/Interwetten","https://www.instagram.com/lottobayern/","https://twitter.com/lottobayern","https://de.linkedin.com/company/lotto-bayern"]',
        'Organization-Name',
        'Organization-Brand',
        'Organization-Slogan',
        'kontakt/kontakt-formular/',
        'http://lbup.local/wp-content/uploads/2021/02/lotto_transparent.png',
        'Article-Headline',
        'Article-alternativeHeadline',
        '/wp-content/uploads/2021/02/lotto_transparent.png',
        '_Article-Autor_',
        'Article-Award',
        'Article-Editor',
        'Article-Genre',
        'Article-Keywords',
        'Article-WordCount',
        'Publisher-Name',
        '/wp-content/uploads/2021/02/lotto_transparent.png',
        'kontakt/kontakt-formular/',
        'MainEntityOfPage-URL',
        date("Y-m-d H:i:s"),
        date("Y-m-d H:i:s"),
        date("Y-m-d H:i:s"),
        'Article-Description',
        'Article-Body'
    ),
    $structuredData_html)
    ;


    echo $structuredData_html;
}
