<?php

// HEADER START 
function seo_header()
{
	$html = file_get_contents( get_template_directory().'/views/header.blade.html');

	$page_data = page_data();
    #$css = file_get_contents(get_template_directory().'/css/main_min.css');
    $css = '';
    $css .= file_get_contents(get_template_directory().'/css/viewport.css');
//    $css .= file_get_contents(get_template_directory().'/css/viewport_back_15-03-2021.css');
	
	$html = str_replace(
	array(
		'{{language}}',
		'{{title}}',
		'{{site_name}}',
		'{{canonical}}',
		'{{viewport_css}}',
		'{{meta_index}}',
		'{{meta_description}}',
	),
	array(
		'de',
		(strlen($page_data->meta_title) > 0 ) ? $page_data->meta_title : get_the_title(),
		get_bloginfo('name'),
		(strlen($page_data->canonical) > 0 ) ? $page_data->canonical : get_permalink(),
		minify_css($css),
		$page_data->meta_index,
		$page_data->meta_description,
	),
	$html);

	
    #echo minify_html($html);
	echo $html;
}
/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 */
function seo_breadcrumb() {
 $delimiter = '&raquo;&nbsp;';
 //$delimiter = bs_get_theme_svg( 'arrow-double' );
 $home = 'Home'; 
 $before = '<span class="current-page">'; 
 $after = '</span>'; 
 
 if ( !is_home() && !is_front_page() || is_paged() ) {
 
 echo '<nav class="breadcrumb">';
 echo '<ul itemscope="" itemtype="http://schema.org/BreadcrumbList">';
 global $post;
 $homeLink = get_bloginfo('url');
 echo '<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . $homeLink . '"><span itemprop="name" class="screen-reader-text">'.$home.'</span> ' .bs_get_theme_svg( 'home' ).'</a> ' . $delimiter . ' <meta itemprop="position" content="1"></li>';
 
 if ( is_category()) {
 global $wp_query;
 $cat_obj = $wp_query->get_queried_object();
 $thisCat = $cat_obj->term_id;
 $thisCat = get_category($thisCat);
 $parentCat = get_category($thisCat->parent);
 if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
 echo $before . single_cat_title('', false) . $after;
 
 } elseif ( is_day() ) {
 echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
 echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
 echo $before . get_the_time('d') . $after;
 
 } elseif ( is_month() ) {
 echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
 echo $before . get_the_time('F') . $after;
 
 } elseif ( is_year() ) {
 echo $before . get_the_time('Y') . $after;
 
 } elseif ( is_single() && !is_attachment() ) {
 if ( get_post_type() != 'post' ) {
 $post_type = get_post_type_object(get_post_type());
 $slug = $post_type->rewrite;
 echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
 echo $before . get_the_title() . $after;
 } else {
 $cat = get_the_category(); $cat = $cat[0];
 echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
 echo $before . get_the_title() . $after;
 }
 
 } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
 $post_type = get_post_type_object(get_post_type());
 echo $before . $post_type->labels->singular_name . $after;
 

 } elseif ( is_attachment() ) {
 $parent = get_post($post->post_parent);
 $cat = get_the_category($parent->ID); $cat = $cat[0];
 echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
 echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
 echo $before . get_the_title() . $after;
 
 } elseif ( is_page() && !$post->post_parent ) {
 echo '<li>'.$before . get_the_title() . $after.'</li>';
 
 } elseif ( is_page() && $post->post_parent ) {
 $parent_id = $post->post_parent;
 $breadcrumbs = array(); 
 while ($parent_id) {
 $page = get_page($parent_id);
 $breadcrumbs[] = '<a itemprop="item" href="' . get_permalink($page->ID) . '">'. get_the_title($page->ID) . '</a><span itemprop="name" class="screen-reader-text">'.get_the_title($page->ID).'</span>';
 $parent_id = $page->post_parent; 
 }
 $breadcrumbs = array_reverse($breadcrumbs);
 foreach ($breadcrumbs as $key => $crumb) echo '<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">'.$crumb . ' ' . $delimiter . ' <meta itemprop="position" content="'.($key+2).'"></li> ';
 echo '<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="">'.$before . get_the_title() . $after.'</a><span itemprop="name" class="screen-reader-text">'.get_the_title().'</span> <meta itemprop="position" content="'.(count($breadcrumbs)+2).'"></li>';

 
 } elseif ( is_search() ) {
 echo $before . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $after;
 
 } elseif ( is_tag() ) {
 echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;

 } elseif ( is_404() ) {
 echo $before . 'Fehler 404' . $after;
 }
 
 if ( get_query_var('paged') ) {
 if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
 echo ': ' . __('Seite') . ' ' . get_query_var('paged');
 if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
 }
 echo '</ul>';
 echo '</nav>';
 
 } 
} 
function page_data()
{
	$db = db();
	$q = 'SELECT * FROM wp_posts,wp_seo WHERE wp_posts.ID = wp_seo.page_id AND wp_posts.ID = "'.get_the_ID().'"';
	if (false === $r = $db->query($q) OR !$r->num_rows)
	{
		$data = array();
	}
	else
	{
		$data = $r->fetch_object();
        
        $data->meta_index = 'index';

        if ($data->indexable == 0)
        {
            $data->meta_index = 'noindex';
        }    

        if ($data->follow == 0)
        {
            $data->meta_index .= ',nofollow';
        }
        else
        {
            $data->meta_index .= ',follow';
        }
        #print_r($data);die;

	}
	return $data;
}

function buildTree( array &$elements, $parentId = 0 )
{
    $branch = array();
    foreach ( $elements as &$element )
    {
        if ( $element->menu_item_parent == $parentId )
        {
            $children = buildTree( $elements, $element->ID );
            if ( $children )
                $element->wpse_children = $children;

            $branch[$element->ID] = $element;
            unset( $element );
        }
    }
    return $branch;
}
// HEADER END 
function wp_get_menu_array($current_menu) {
    $array_menu = wp_get_nav_menu_items($current_menu);
    $array_menu_sub = buildTree( $array_menu, 0 );    
    return $array_menu_sub;
}

function sub_menu($view,$current_menu,$current_menu_id) {
    $submenu_html='';
    $submenu_html_liste='';
    if($current_menu->wpse_children)
    {

        $i = 0;
        foreach ($current_menu->wpse_children as $key => $child) {
            $submenu_html_liste.='<div class="sub_menu_block">';
            $submenu_html_liste.='<label>'.$child->description.'</label>';
            if($child->wpse_children)
            {
                foreach ($child->wpse_children as $key => $sub_child) {
                    $submenu_html_liste.='<a href="'. $sub_child->url.'" class="sub_menu_item">'. $sub_child->title.'<span class="material-icons">arrow_forward_ios</span></a>';
                }
            } 
            else
            {
                $submenu_html_liste.='<a href="'. $child->url.'" class="sub_menu_item">'. $child->title.'<span class="material-icons">arrow_forward_ios</span></a>';
            }
            $submenu_html_liste.='</div>';
            $i++;
        }
        if($view=='d')
        {

            $k= 3 - $i;
            $the_query = new WP_Query( array(
                'category_name' => $current_menu->title,
                'posts_per_page' => $k ,
                )
            ); 
            if ( $the_query->have_posts() && $k>0) :
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                $title  = get_the_title();
                $excerpt = get_the_excerpt();
                $post_image = get_the_post_thumbnail( $post);
                $permalink = get_permalink( $post );
                $submenu_html_liste.='<div class="sub_menu_block blog">'.$post_image.'<p>'.$title.'</p><a href="'.$permalink.'">zum Artikel<span class="material-icons">arrow_right_alt</span></a></div>';
                endwhile; 
                wp_reset_postdata(); 
            else : 
                 $submenu_html_liste.='<div class="sub_menu_block blog"></div>';               
            endif;
        }


        $submenu_html .='<div class="show-test '.$view.' '.$view.'_'.$current_menu->ID.'" id="div_'.$view.'_'.$current_menu->ID.'">'.$submenu_html_liste.'</div>';
    }   
    $res = array('x' => $submenu_html ,'y'=>$i);

    return $res;
    return $submenu_html;
}

function getSubMenu($current_menu,$view) {
    $a = wp_get_menu_array($current_menu);
    $submenu_html='';
    foreach ($a as $key => $value) {
        $submenu_html .= sub_menu($view,$value,$key)['x'];
    } 
    return $submenu_html;
}
function getArticelMenu($current_menu,$view) {
    $a = wp_get_menu_array($current_menu);
    $submenu_html='';
    $submenu_html_liste='';

    foreach ($a as $key => $value) {
        $i = 3 - sub_menu($view,$value,$key)['y'];
        $submenu_html_liste='';
        $the_query = new WP_Query( array(
            'category_name' => $value->title,
            'posts_per_page' => $i,
            )
        ); 
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post(); 
            $title  = get_the_title();
            $excerpt = get_the_excerpt();
            $post_image = get_the_post_thumbnail( $post);
            $permalink = get_permalink( $post );
            $submenu_html_liste.='<div class="sub_menu_block blog">'.$post_image.'<p>'.$title.'</p><a href="'.$permalink.'">zum Artikel<span class="material-icons">arrow_right_alt</span></a></div>';
            endwhile; 
            wp_reset_postdata(); 
        else : 
        endif; 
        if($i>0){
            $submenu_html .='<div class="blog show-test '.$view.' '.$view.'_'.$value->ID.'" id="div_'.$view.'_'.$value->ID.'_blog">'.$submenu_html_liste.'</div>';
        }
        else
        {

            $submenu_html .='<div class="show-test '.$view.' '.$view.'_'.$value->ID.'" id="div_'.$view.'_'.$value->ID.'_blog"></div>';            
        }
    } 
    return $submenu_html;
}
function haupt_menu($current_menu,$view) {
    $html ='';
    $a = wp_get_menu_array($current_menu);
    $submenu_html='';

    //$html .='<button class="main-navi_btn toggle" data-toggle-target=".show-test.alle">alle</button>'; 
    foreach ($a as $key => $value) {

        if($value->wpse_children)
        {
            $html .='<button class="main-navi_btn toggle_x '.$view.'" data-toggle-target_x=".show-test.'.$view.'_'.$value->ID.'"  onclick="updateNavi_'.$view.'('.$value->ID.')" id="btn_'.$view.'_'.$value->ID.'">'.$value->title;  
            $html .='<span class="material-icons desktop_hidden">arrow_forward_ios</span>';
            $html .='</button>';        
        }
        else
        {

            $menu_items = wp_get_nav_menu_items( $current_menu );
            $this_item = current( wp_filter_object_list( $menu_items, array( 'object_id' => get_queried_object_id() ) ) );
            $active='';
            if($this_item->title == $value->title)
            {
                $active=' active';
            }
            $html .= '<a href="'.$value->url.'" class="main-navi_btn '.$view.$active.'">'.$value->title.'</a>';
        }

    } 
    return $html;
}

function back_haupt_menu($view) {
    $html ='';
    if ($view=='m')
    {
        $html='<button class="desktop_hidden" onclick="backNavi()" id="back_navi">
            <span class="material-icons">arrow_back_ios</span>
            </button>';
    }

    return $html;
}

function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'top-menu' => __( 'MainNavigation' ),
      'footer-menu' => __( 'Footer Menu' ),
      'social' => __( 'Social Menu' ),
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );


function my_get_menu_item_name( $loc ) {
    global $post;

    $locs = get_nav_menu_locations();

    $menu = wp_get_nav_menu_object( $locs[$loc] );

    if($menu) {

        $items = wp_get_nav_menu_items($menu->term_id);

        foreach ($items as $k => $v) {
            // Check if this menu item links to the current page
            if ($items[$k]->object_id == $post->ID) {
                $name = $items[$k]->title;
                break;
            }
        }

    }
    return $name;
}


add_filter( 'wp_nav_menu_objects', 'submenu_limit', 10, 2 );

function submenu_limit( $items, $args ) {

    if ( empty( $args->submenu ) ) {
        return $items;
    }

    $ids       = wp_filter_object_list( $items, array( 'title' => $args->submenu ), 'and', 'ID' );
    $parent_id = array_pop( $ids );
    $children  = submenu_get_children_ids( $parent_id, $items );

    foreach ( $items as $key => $item ) {

        if ( ! in_array( $item->ID, $children ) ) {
            unset( $items[$key] );
        }
    }

    return $items;
}

function submenu_get_children_ids( $id, $items ) {

    $ids = wp_filter_object_list( $items, array( 'menu_item_parent' => $id ), 'and', 'ID' );

    foreach ( $ids as $id ) {

        $ids = array_merge( $ids, submenu_get_children_ids( $id, $items ) );
    }

    return $ids;
}

// Handle/Create Custom-Block-Pattern
require get_template_directory() . '/block-patterns.php';



require get_template_directory() . '/inc/custom_logo.php';


require get_template_directory() . '/inc/template-tags.php';

// Handle SVG icons.
require get_template_directory() . '/classes/class-bs-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';

// Handle Customizer settings.
require get_template_directory() . '/classes/class-bs-customize.php';
// Require Separator Control class.
require get_template_directory() . '/classes/class-bs-separator-control.php';

// Custom page walker.
require get_template_directory() . '/classes/class-bs-walker-page.php';

/**
 * Displays SVG icons in social links menu.
 *
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        Menu item data object.
 * @param int      $depth       Depth of the menu. Used for padding.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 * @return string The menu item output with social icon.
 */
function bs_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
    // Change SVG icon inside social links menu if there is supported URL.
    if ( 'social' === $args->theme_location ) {
        //$svg = TwentyTwenty_SVG_Icons::get_social_link_svg( $item->url );
        $svg = bS_SVG_Icons::get_social_link_svg( $item->url );
        if ( empty( $svg ) ) {        
            $svg = twentytwenty_get_theme_svg( 'link' );
        }
        $item_output = str_replace( '</span>', '</span>' . $svg, $item_output );
    }
    return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'bs_nav_menu_social_icons', 10, 4 );

// Einbindung und Ergänzungen für StructuredData
require get_template_directory() . '/inc/structureddata-content.php';

// Einbindung und Ergänzungen für index-slider
require get_template_directory() . '/inc/index_slider-content.php';

// FOOTER START 

function footer()
{
	$html = file_get_contents(get_template_directory().'/views/footer.blade.html');
    
	$page_data = page_data();
	
	$html = str_replace(
	array(
		'{{language}}',
        '{{canonical}}',
        '{{title}}',
        '{{meta_description}}',
	),
	array(
		'de',
        (strlen($page_data->canonical) > 0 ) ? $page_data->canonical : get_permalink(),
        (strlen($page_data->meta_title) > 0 ) ? $page_data->meta_title : get_the_title(),
        $page_data->meta_description,
	),
	$html);
	#echo minify_html($html);

	echo $html;
}

function get_FooterMenu()
{

                $menuParameters = array(
                    'menu' => '',
                    'before'               => '',
                    'after'                => '',
                    'link_before'          => '',
                    'link_after'           => '',
                    'container'       => false,
                    'echo'            => false,
                    'depth'           => 0,
                    'items_wrap'           => '<div id="%1$s" class="footer_menu">%3$s</div>',

                    'theme_location'       => 'footer-menu',
                );

               $footer_menu = strip_tags(wp_nav_menu( $menuParameters ), '<a><div>' );

    return $footer_menu;
}
// FOOTER END 

function get_my_content()
{
    $html = apply_filters('the_content', get_the_content());

    $html = str_replace(
        array(
            '<img src',
            ''
        ),
        array(
            '<img class="block_image" width="473" height="305" src="/wp-content/themes/bS/assets/p.gif" data-src',
            ''
        ),
        $html
    );    /**/
    preg_match_all( '@<h[1-6][\w|\W]*?</h[1-6]>@', $html, $_headings );
    $i = 0;
    foreach ($_headings[0] as $key => $value) {
        // is ID defined for headline?  
        preg_match_all( '@<([^\s]+).*?id="([^"]*?)".*?>(.+?)</\1>@', $value, $_html );
        $str_2 = $value;

        if(!$_html[0][0] or $_html[0][0]=='')
        {
            preg_match_all( '@<([^\s]+).*?>(.+?)</\1>@', $value, $_html );
            $tag = 'headline_'.$_html[1][0].'_'.$i;
            $str_1  =  $_html[0][0];
            $str_2  = str_replace(
                array(
                    '<'.$_html[1][0]
                ),
                array(
                    '<'.$_html[1][0].' id="'.$tag.'"'
                ),
                $str_1
            );
        }

        $html = str_replace($value,$str_2,$html);
        $i++;
    }

    return $html;
}

function get_skiplinks()
{
$html = apply_filters('the_content', get_the_content());    

    $skiplinks ='<nav class="skiplinks l-site-width js-skiplinks" id="skiplinks" role="navigation" data-has-module="yes"><h2 class="is-visuallyhidden">Skiplinks</h2><ul>';

    preg_match_all( '@<h[1-6][\w|\W]*?</h[1-6]>@', $html, $_headings );
    $i = 0;
    foreach ($_headings[0] as $key => $value) {
        // is ID defined for headline?  
        preg_match_all( '@<([^\s]+).*?id="([^"]*?)".*?>(.+?)</\1>@', $value, $_html );
        $str_2 = $value;

        if(!$_html[0][0] or $_html[0][0]=='')
        {
            preg_match_all( '@<([^\s]+).*?>(.+?)</\1>@', $value, $_html );
            $tag = 'headline_'.$_html[1][0].'_'.$i;
       }

        $html = str_replace($value,$str_2,$html);
        $skiplinks .=' <li class="skiplink"><a accesskey="'.$i.'" href="#'.$tag.'" title="ALT + '.$i.'">'.$_html[2][0].'</a></li>';        
        $i++;
        }
        $skiplinks .='<li class="skiplink"><a accesskey="'.$i.'" href="#lb-search" title="[ALT + '.$i.']">Skip to search</a></li>';      
        $skiplinks .='</ul></nav>';
    return $skiplinks;
}
function get_content()
{
    $html = get_the_content();
    $html = str_replace(
        array(
            '<img src',
            ''
        ),
        array(
            '<img src="/wp-content/themes/bS/assets/p.gif" data-src',
            ''
        ),
        $html
    );
    #echo minify_html($html);
    return $html;
}



// HOOKS / ADDITIONAL FUNCTIONS START 
add_action('save_post', 'postSave');
add_action('delete_post', 'cleanup_seo');
add_action('trash_post', 'cleanup_seo');



function postSave($post_ID)
{
    setup_seo($post_ID);
    postChangedEmail($post_ID);
}

function setup_seo($post_ID) 
{
    $db = db();
    $q = 'SELECT * FROM wp_seo WHERE wp_seo.page_id = "'.$post_ID.'"';
    if (false === $r = $db->query($q) OR !$r->num_rows)
    {
        $q = 'INSERT INTO wp_seo (page_id) VALUES ("'.$post_ID.'")';
        $db->query($q);
    }
}


function cleanup_seo($post_ID) // GET'S CALLED WHEN TRASH IS BEING EMPTIED !!!
{
    $db = db();
    $q = 'DELETE FROM wp_seo WHERE wp_seo.page_id = "'.$post_ID.'"';
    $db->query($q);
}

// HOOKS / ADDITIONAL FUNCTIONS END




// HELPER FUNCTIONS 

function postChangedEmail($post_ID)
{
    // t.b.d.
}


function db()
{
	$db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	return $db;
}

function minify_html($input) {
    if(trim($input) === "") return $input;
    // Remove extra white-space(s) between HTML attribute(s)
    $input = preg_replace_callback('#<([^\/\s<>!]+)(?:\s+([^<>]*?)\s*|\s*)(\/?)>#s', function($matches) {
        return '<' . $matches[1] . preg_replace('#([^\s=]+)(\=([\'"]?)(.*?)\3)?(\s+|$)#s', ' $1$2', $matches[2]) . $matches[3] . '>';
    }, str_replace("\r", "", $input));
    // Minify inline CSS declaration(s)
    if(strpos($input, ' style=') !== false) {
        $input = preg_replace_callback('#<([^<]+?)\s+style=([\'"])(.*?)\2(?=[\/\s>])#s', function($matches) {
            return '<' . $matches[1] . ' style=' . $matches[2] . minify_css($matches[3]) . $matches[2];
        }, $input);
    }
    if(strpos($input, '</style>') !== false) {
      $input = preg_replace_callback('#<style(.*?)>(.*?)</style>#is', function($matches) {
        return '<style' . $matches[1] .'>'. minify_css($matches[2]) . '</style>';
      }, $input);
    }
    if(strpos($input, '</script>') !== false) {
      $input = preg_replace_callback('#<script(.*?)>(.*?)</script>#is', function($matches) {
        return '<script' . $matches[1] .'>'. minify_js($matches[2]) . '</script>';
      }, $input);
    }

    return preg_replace(
        array(
            // t = text
            // o = tag open
            // c = tag close
            // Keep important white-space(s) after self-closing HTML tag(s)
            '#<(img|input)(>| .*?>)#s',
            // Remove a line break and two or more white-space(s) between tag(s)
            '#(<!--.*?-->)|(>)(?:\n*|\s{2,})(<)|^\s*|\s*$#s',
            '#(<!--.*?-->)|(?<!\>)\s+(<\/.*?>)|(<[^\/]*?>)\s+(?!\<)#s', // t+c || o+t
            '#(<!--.*?-->)|(<[^\/]*?>)\s+(<[^\/]*?>)|(<\/.*?>)\s+(<\/.*?>)#s', // o+o || c+c
            '#(<!--.*?-->)|(<\/.*?>)\s+(\s)(?!\<)|(?<!\>)\s+(\s)(<[^\/]*?\/?>)|(<[^\/]*?\/?>)\s+(\s)(?!\<)#s', // c+t || t+o || o+t -- separated by long white-space(s)
            '#(<!--.*?-->)|(<[^\/]*?>)\s+(<\/.*?>)#s', // empty tag
            '#<(img|input)(>| .*?>)<\/\1>#s', // reset previous fix
            '#(&nbsp;)&nbsp;(?![<\s])#', // clean up ...
            '#(?<=\>)(&nbsp;)(?=\<)#', // --ibid
            // Remove HTML comment(s) except IE comment(s)
            '#\s*<!--(?!\[if\s).*?-->\s*|(?<!\>)\n+(?=\<[^!])#s'
        ),
        array(
            '<$1$2</$1>',
            '$1$2$3',
            '$1$2$3',
            '$1$2$3$4$5',
            '$1$2$3$4$5$6$7',
            '$1$2$3',
            '<$1$2',
            '$1 ',
            '$1',
            ""
        ),
    $input);
}

function minify_js($input) {
    if(trim($input) === "") return $input;
    return preg_replace(
        array(
            // Remove comment(s)
            '#\s*("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')\s*|\s*\/\*(?!\!|@cc_on)(?>[\s\S]*?\*\/)\s*|\s*(?<![\:\=])\/\/.*(?=[\n\r]|$)|^\s*|\s*$#',
            // Remove white-space(s) outside the string and regex
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/)|\/(?!\/)[^\n\r]*?\/(?=[\s.,;]|[gimuy]|$))|\s*([!%&*\(\)\-=+\[\]\{\}|;:,.<>?\/])\s*#s',
            // Remove the last semicolon
            '#;+\}#',
            // Minify object attribute(s) except JSON attribute(s). From `{'foo':'bar'}` to `{foo:'bar'}`
            '#([\{,])([\'])(\d+|[a-z_][a-z0-9_]*)\2(?=\:)#i',
            // --ibid. From `foo['bar']` to `foo.bar`
            '#([a-z0-9_\)\]])\[([\'"])([a-z_][a-z0-9_]*)\2\]#i'
        ),
        array(
            '$1',
            '$1$2',
            '}',
            '$1$3',
            '$1.$3'
        ),
    $input);
}

function minify_css($input) {
    if(trim($input) === "") return $input;
    return preg_replace(
        array(
            // Remove comment(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
            // Remove unused white-space(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~]|\s(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
            // Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
            '#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
            // Replace `:0 0 0 0` with `:0`
            '#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
            // Replace `background-position:0` with `background-position:0 0`
            '#(background-position):0(?=[;\}])#si',
            // Replace `0.6` with `.6`, but only when preceded by `:`, `,`, `-` or a white-space
            '#(?<=[\s:,\-])0+\.(\d+)#s',
            // Minify string value
            '#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][a-z0-9\-_]*?)\2(?=[\s\{\}\];,])#si',
            '#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
            // Minify HEX color code
            '#(?<=[\s:,\-]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
            // Replace `(border|outline):none` with `(border|outline):0`
            '#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
            // Remove empty selector(s)
            '#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s'
        ),
        array(
            '$1',
            '$1$2$3$4$5$6$7',
            '$1',
            ':0',
            '$1:0 0',
            '.$1',
            '$1$3',
            '$1$2$4$5',
            '$1$2$3',
            '$1:0',
            '$1$2'
        ),
    $input);
}


function minify_css_kg($css)
{
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css); // negative look ahead
    $css = preg_replace('/\s{2,}/', ' ', $css);
    $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return $css;
}



function bS_theme_support() {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Custom background color.
    add_theme_support(
        'custom-background',
        array(
            'default-color' => 'f5efe0',
        )
    );

    // Set content-width.
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 580;
    }

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // Set post thumbnail size.
    set_post_thumbnail_size( 1200, 9999 );

    // Add custom image size used in Cover Template.
    add_image_size( 'bs-fullscreen', 1980, 9999 );

    // Custom logo.
    $logo_width  = 120;
    $logo_height = 90;

    // If the retina setting is active, double the recommended width and height.
    if ( get_theme_mod( 'retina_logo', false ) ) {
        $logo_width  = floor( $logo_width * 2 );
        $logo_height = floor( $logo_height * 2 );
    }

    add_theme_support(
        'custom-logo',
        array(
            'height'      => $logo_height,
            'width'       => $logo_width,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
            'navigation-widgets',
        )
    );
}


/**
 * Get accessible color for an area.
 *
 * @since Twenty Twenty 1.0
 *
 * @param string $area The area we want to get the colors for.
 * @param string $context Can be 'text' or 'accent'.
 * @return string Returns a HEX color.
 */
function bs_get_color_for_area( $area = 'content', $context = 'text' ) {

    // Get the value from the theme-mod.
    $settings = get_theme_mod(
        'accent_accessible_colors',
        array(
            'content'       => array(
                'text'      => 'blue',
                'accent'    => '#cd2653',
                'secondary' => '#6d6d6d',
                'borders'   => '#dcd7ca',
            ),
            'header-footer' => array(
                'text'      => 'green',
                'accent'    => '#cd2653',
                'secondary' => '#6d6d6d',
                'borders'   => '#dcd7ca',
            ),
        )
    );

    // If we have a value return it.
    if ( isset( $settings[ $area ] ) && isset( $settings[ $area ][ $context ] ) ) {
        return $settings[ $area ][ $context ];
    }

    // Return false if the option doesn't exist.
    return false;
}


/*
function kb_whitelist_blocks() {
  return array(
    'core/heading',
    'core/paragraph',
    'core/image',
    'lb/two_column_text',
    'lb/text-img',
    'lb/img-text',
    'my-first-gutenberg-block/image-with-text-block',
    'my-lb-block/accordion-item'
  );
}
add_filter('allowed_block_types','kb_whitelist_blocks');
*/
/**
 * Add featured image column to WP admin panel - posts AND pages
 * See: https://j0e.org/featured-image-admin/
 */

// Set thumbnail size
add_image_size( 'j0e_admin-featured-image', 60, 60, false );

// Add the posts and pages columns filter. Same function for both.
add_filter('manage_posts_columns', 'j0e_add_thumbnail_column', 2);
add_filter('manage_pages_columns', 'j0e_add_thumbnail_column', 2);
function j0e_add_thumbnail_column($j0e_columns){
  $j0e_columns['j0e_thumb'] = __('Image');
  return $j0e_columns;
}
 
// Add featured image thumbnail to the WP Admin table.
add_action('manage_posts_custom_column', 'j0e_show_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'j0e_show_thumbnail_column', 5, 2);
function j0e_show_thumbnail_column($j0e_columns, $j0e_id){
  switch($j0e_columns){
    case 'j0e_thumb':
    if( function_exists('the_post_thumbnail') )
      echo the_post_thumbnail( 'j0e_admin-featured-image' );
    break;
  }
}

// Move the new column at the first place.
add_filter('manage_posts_columns', 'j0e_column_order');
function j0e_column_order($columns) {
  $n_columns = array();
  $move = 'j0e_thumb'; // which column to move
  $before = 'title'; // move before this column

  foreach($columns as $key => $value) {
    if ($key==$before){
      $n_columns[$move] = $move;
    }
    $n_columns[$key] = $value;
  }
  return $n_columns;
}

// Format the column width with CSS
add_action('admin_head', 'j0e_add_admin_styles');
function j0e_add_admin_styles() {
  echo '<style>.column-j0e_thumb {width: 60px;}</style>';
}
// Activate set featured image

add_theme_support('post-thumbnails');