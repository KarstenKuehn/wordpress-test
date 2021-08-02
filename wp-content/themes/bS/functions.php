<?php

@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');

// HEADER START 
function seo_header()
{
    $html = file_get_contents(get_template_directory() . '/views/header.blade.html');

    $page_data = page_data();
    #$css = file_get_contents(get_template_directory().'/css/main_min.css');
    $css = '';
    $css .= file_get_contents(get_template_directory() . '/css/viewport.css');
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
            '{{ETRACKER_CODE}}'
        ),
        array(
            'de',
            (strlen($page_data->meta_title) > 0) ? $page_data->meta_title : get_the_title(),
            get_bloginfo('name'),
            (strlen($page_data->canonical) > 0) ? $page_data->canonical : get_permalink(),
            minify_css($css),
            $page_data->meta_index,
            $page_data->meta_description,
            code_head_etracker()
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
function seo_breadcrumb()
{
    $delimiter = '&raquo;&nbsp;';
    //$delimiter = bs_get_theme_svg( 'arrow-double' );
    $home = 'Home';
    $before = '<span class="current-page">';
    $after = '</span>';

    if (!is_home() && !is_front_page() || is_paged()) {

        echo '<nav class="breadcrumb">';
        echo '<ul itemscope="" itemtype="http://schema.org/BreadcrumbList">';
        global $post;
        $homeLink = get_bloginfo('url');
        echo '<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . $homeLink . '"><span itemprop="name" class="screen-reader-text">' . $home . '</span> ' . bs_get_theme_svg('home') . '</a> ' . $delimiter . ' <meta itemprop="position" content="1"></li>';

        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $before . single_cat_title('', false) . $after;

        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;

        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;

        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;

        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $before . get_the_title() . $after;
            }

        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;


        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;

        } elseif (is_page() && !$post->post_parent) {
            echo '<li>' . $before . get_the_title() . $after . '</li>';

        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a itemprop="item" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a><span itemprop="name" class="screen-reader-text">' . get_the_title($page->ID) . '</span>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $key => $crumb) echo '<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">' . $crumb . ' ' . $delimiter . ' <meta itemprop="position" content="' . ($key + 2) . '"></li> ';
            echo '<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="">' . $before . get_the_title() . $after . '</a><span itemprop="name" class="screen-reader-text">' . get_the_title() . '</span> <meta itemprop="position" content="' . (count($breadcrumbs) + 2) . '"></li>';


        } elseif (is_search()) {
            echo $before . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $after;

        } elseif (is_tag()) {
            echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;

        } elseif (is_404()) {
            echo $before . 'Fehler 404' . $after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
            echo ': ' . __('Seite') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
        }
        echo '</ul>';
        echo '</nav>';

    }
}

function page_data()
{
    $db = db();
    $q = 'SELECT * FROM wp_posts,wp_seo WHERE wp_posts.ID = wp_seo.page_id AND wp_posts.ID = "' . get_the_ID() . '"';
    if (false === $r = $db->query($q) or !$r->num_rows) {
        $data = array();
    } else {
        $data = $r->fetch_object();

        $data->meta_index = 'index';

        if ($data->indexable == 0) {
            $data->meta_index = 'noindex';
        }

        if ($data->follow == 0) {
            $data->meta_index .= ',nofollow';
        } else {
            $data->meta_index .= ',follow';
        }
        #print_r($data);die;

    }
    return $data;
}

function buildTree(array &$elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as &$element) {
        if ($element->menu_item_parent == $parentId) {
            $children = buildTree($elements, $element->ID);
            if ($children)
                $element->wpse_children = $children;

            $branch[$element->ID] = $element;
            unset($element);
        }
    }
    return $branch;
}

// HEADER END
function wp_get_menu_array($current_menu)
{
    $array_menu = wp_get_nav_menu_items($current_menu);
    $array_menu_sub = buildTree($array_menu, 0);
    return $array_menu_sub;
}

function sub_menu($view, $current_menu, $current_menu_id)
{
    $submenu_html = '';
    $submenu_html_liste = '';
    $bild_navigation = '';
    $menu_list = '';
    $i = 0;
    if ($current_menu->wpse_children) {

        /**/


        foreach ($current_menu->wpse_children as $key => $child) {
            $submenu_html_liste .= '<div class="sub_menu_block navi">';
            $submenu_html_liste .= (strlen(trim($child->description)) > 0) ? '<label>' . $child->description . '</label>' : '';
            if ($child->wpse_children) {
                foreach ($child->wpse_children as $key => $sub_child) {
                    $submenu_html_liste .= '<a href="' . $sub_child->url . '" class="sub_menu_item">' . $sub_child->title . '<span class="material-icons">arrow_forward_ios</span></a>';
                }
            } else {
                $submenu_html_liste .= '<a href="' . $child->url . '" class="sub_menu_item">' . $child->title . '<span class="material-icons">arrow_forward_ios</span></a>';
            }
            $submenu_html_liste .= '</div>';
            $i++;

        }// end foreach ($current_menu->wpse_children...)
        $k = 3 - $i;
        $test = wp_get_menu_array('TeaserNavigation');

        foreach ($test as $key => $teaser_child) {
            if ($current_menu->title == $teaser_child->title) {
                if ($arr = $teaser_child->wpse_children) {

                    $arr = array_slice($arr, 0, $k);
                    foreach ($arr as $key => $sub_child) {

                        $link_text = 'zum Artikel';
                        if (isset($sub_child->description) && $sub_child->description != '') {
                            $link_text = $sub_child->description;
                        }
                        $bild_navigation .= '<div class="sub_menu_block blog"><div class="menu_teaser_bild" style="background-image: url(' . get_the_post_thumbnail_url($sub_child->object_id) . ')"></div><div class="menu_teaser_content"><h3>' . $sub_child->title . '</h3><a href="' . $sub_child->url . '">' . $link_text . '<span class="material-icons">arrow_right_alt</span></a></div></div>';

                    }
                }
            }

        }

        if ($view == 'd') {

            $submenu_html .= '<div class="show-test ' . $view . ' ' . $view . '_' . $current_menu->ID . '" id="div_' . $view . '_' . $current_menu->ID . '">' . $menu_list . $submenu_html_liste . $bild_navigation . '</div>';

        }

        if ($view == 'm') {
            $submenu_html .= '<div class="show-test ' . $view . ' ' . $view . '_' . $current_menu->ID . '" id="div_' . $view . '_' . $current_menu->ID . '">' . $menu_list . $bild_navigation . $submenu_html_liste . '</div>';
        }


    }   // end  if($current_menu->wpse_children)


    $res = array('x' => $submenu_html, 'y' => $i);

    return $res;
    return $submenu_html;
}

function getSubMenu($current_menu, $view)
{
    $a = wp_get_menu_array($current_menu);
    $submenu_html = '';
    foreach ($a as $key => $value) {
        $submenu_html .= sub_menu($view, $value, $key)['x'];
    }
    return $submenu_html;
}

function getArticelMenu($current_menu, $view)
{
    $a = wp_get_menu_array($current_menu);
    $submenu_html = '';
    $submenu_html_liste = '';

    foreach ($a as $key => $value) {
        $i = 3 - sub_menu($view, $value, $key)['y'];
        $submenu_html_liste = '';
        $the_query = new WP_Query(array(
                'category_name' => $value->title,
                'posts_per_page' => $i,
            )
        );
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
                $title = get_the_title();
                $excerpt = get_the_excerpt();
                $post_image = get_the_post_thumbnail($post);
                $permalink = get_permalink($post);
                $submenu_html_liste .= '<div class="sub_menu_block blog">' . $post_image . '<p>' . $title . '</p><a href="' . $permalink . '">zum Artikel<span class="material-icons">arrow_right_alt</span></a></div>';
            endwhile;
            wp_reset_postdata();
        else :
        endif;
        $submenu_html_liste = '';

        if ($i > 0) {
            $submenu_html .= '<div class="blog show-test ' . $view . ' ' . $view . '_' . $value->ID . '" id="div_' . $view . '_' . $value->ID . '_blog">' . $submenu_html_liste . '</div>';
        } else {

            $submenu_html .= '<div class="show-test ' . $view . ' ' . $view . '_' . $value->ID . '" id="div_' . $view . '_' . $value->ID . '_blog"></div>';
        }
    }
    return $submenu_html;
}

function haupt_menu($current_menu, $view)
{
    $html = '';
    $a = wp_get_menu_array($current_menu);
    $submenu_html = '';

    //$html .='<button class="main-navi_btn toggle" data-toggle-target=".show-test.alle">alle</button>'; 
    foreach ($a as $key => $value) {

        if ($value->wpse_children) {
            $html .= '<button class="main-navi_btn toggle_x ' . $view . '" data-toggle-target_x=".show-test.' . $view . '_' . $value->ID . '"  onclick="updateNavi_' . $view . '(' . $value->ID . ')" id="btn_' . $view . '_' . $value->ID . '">' . $value->title;
            $html .= '<span class="material-icons desktop_hidden">arrow_forward_ios</span>';
            $html .= '</button>';
        } else {

            $menu_items = wp_get_nav_menu_items($current_menu);
            $this_item = current(wp_filter_object_list($menu_items, array('object_id' => get_queried_object_id())));
            $active = '';
            if (isset($value->title) && (isset($this_item->title)) && $this_item->title == $value->title) {
                $active = ' active';
            }
            $html .= '<a href="' . $value->url . '" class="main-navi_btn ' . $view . $active . '">' . $value->title . '</a>';
        }

    }
    return $html;
}

function getSubMenuList($current_menu, $current_id = '', $view)
{
    $a = wp_get_menu_array($current_menu);
    $submenu_html = '';
    if ($current_id != '') {
        $submenu_html .= sub_menu_list($view, $a[$current_id], $current_id)['x'];
    }

    /*
        foreach ($a as $key => $value) {    echo $key;
            $submenu_html .= sub_menu_list($view,$value,$key)['x'];
        }
    */

    return $submenu_html;
}

function haupt_menu_list($current_menu, $view)
{
    //$html ='<ul>';
    $a = wp_get_menu_array($current_menu);
    $submenu_html = '';

    //$html .='<button class="main-navi_btn toggle" data-toggle-target=".show-test.alle">alle</button>'; 
    foreach ($a as $key => $value) {
        $html .= '<li>';
        $html .= '<a href="' . $value->url . '">' . $value->title . '</a>';
        if ($value->wpse_children) {


            $html .= '<div class="submenu">' . getSubMenuList($current_menu, $value->ID, $view) . '</div>';
            /*
                $html.='<ul>';
                    foreach ($value->wpse_children as $subkey => $subvalue) {
                        $html .='<li>';
                        $html .= '<a href="'.$subvalue->url.'">'.$subvalue->title.'</a>';
                        $html .='</li>';
                    }
                    $html.='</ul>';

            */

        }
        /*
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
        */

        $html .= '</li>';
    }
    //$html .='</ul>';
    return $html;
}


function sub_menu_list($view, $current_menu, $current_menu_id)
{
    $submenu_html = '';
    $submenu_html_liste = '';
    $bild_navigation = '';
    if ($current_menu->wpse_children) {

        /**/

        $i = 0;
        foreach ($current_menu->wpse_children as $key => $child) {
            $submenu_html_liste .= '<ul class="sub_menu_block navi">';
            $submenu_html_liste .= (strlen(trim($child->description)) > 0) ? '<label>' . $child->description . '</label>' : '';
            if ($child->wpse_children) {
                foreach ($child->wpse_children as $key => $sub_child) {
                    $submenu_html_liste .= '<li><a href="' . $sub_child->url . '" class="sub_menu_item">' . $sub_child->title . '<span class="material-icons">arrow_forward_ios</span></a></li>';
                }
            } else {
                $submenu_html_liste .= '<li><a href="' . $child->url . '" class="sub_menu_item">' . $child->title . '<span class="material-icons">arrow_forward_ios</span></a></li>';
            }
            $submenu_html_liste .= '</ul>';
            $i++;

        }// end foreach ($current_menu->wpse_children...)
        $k = 3 - $i;
        $test = wp_get_menu_array('TeaserNavigation');

        foreach ($test as $key => $teaser_child) {
            if ($current_menu->title == $teaser_child->title) {
                if ($arr = $teaser_child->wpse_children) {

                    $arr = array_slice($arr, 0, $k);
                    foreach ($arr as $key => $sub_child) {

                        $link_text = 'zum Artikel';
                        if (isset($sub_child->description) && $sub_child->description != '') {
                            $link_text = $sub_child->description;
                        }
                        $bild_navigation .= '<ul class="sub_menu_block blog"><li><a href="' . $sub_child->url . '"><div class="menu_teaser_bild" style="background-image: url(' . get_the_post_thumbnail_url($sub_child->object_id) . ')"></div></a><div class="menu_teaser_content"><p>' . $sub_child->title . '</p><a href="' . $sub_child->url . '">' . $link_text . '<span class="material-icons">arrow_right_alt</span></a></div></li></ul>';

                    }
                }
            }

        }

        if ($view == 'd') {

            $submenu_html .= $menu_list . $submenu_html_liste . $bild_navigation;

        }

        if ($view == 'm') {
            $submenu_html .= '<div class="show-test ' . $view . ' ' . $view . '_' . $current_menu->ID . '" id="div_' . $view . '_' . $current_menu->ID . '">' . $menu_list . $bild_navigation . $submenu_html_liste . '</div>';
        }


    }   // end  if($current_menu->wpse_children)


    $res = array('x' => $submenu_html, 'y' => $i);

    return $res;
    return $submenu_html;
}


function back_haupt_menu($view)
{
    $html = '';
    if ($view == 'm') {
        $html = '<button class="desktop_hidden" onclick="backNavi()" id="back_navi">
            <span class="material-icons">arrow_back_ios</span>
            </button>';
    }

    return $html;
}

function wpb_custom_new_menu()
{
    register_nav_menus(
        array(
            'top-menu' => __('MainNavigation'),
            'teaser-menu' => __('TeaserNavigation'),
            'footer-menu' => __('Footer Menu'),
            'social' => __('Social Menu'),
        )
    );
}

add_action('init', 'wpb_custom_new_menu');


function my_get_menu_item_name($loc)
{
    global $post;

    $locs = get_nav_menu_locations();

    $menu = wp_get_nav_menu_object($locs[$loc]);

    if ($menu) {

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


add_filter('wp_nav_menu_objects', 'submenu_limit', 10, 2);

function submenu_limit($items, $args)
{

    if (empty($args->submenu)) {
        return $items;
    }

    $ids = wp_filter_object_list($items, array('title' => $args->submenu), 'and', 'ID');
    $parent_id = array_pop($ids);
    $children = submenu_get_children_ids($parent_id, $items);

    foreach ($items as $key => $item) {

        if (!in_array($item->ID, $children)) {
            unset($items[$key]);
        }
    }

    return $items;
}

function submenu_get_children_ids($id, $items)
{

    $ids = wp_filter_object_list($items, array('menu_item_parent' => $id), 'and', 'ID');

    foreach ($ids as $id) {

        $ids = array_merge($ids, submenu_get_children_ids($id, $items));
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
 * @param string $item_output The menu item's starting HTML output.
 * @param WP_Post $item Menu item data object.
 * @param int $depth Depth of the menu. Used for padding.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return string The menu item output with social icon.
 */
function bs_nav_menu_social_icons($item_output, $item, $depth, $args)
{
    // Change SVG icon inside social links menu if there is supported URL.
    if ('social' === $args->theme_location) {
        //$svg = TwentyTwenty_SVG_Icons::get_social_link_svg( $item->url );
        $svg = bS_SVG_Icons::get_social_link_svg($item->url);
        if (empty($svg)) {
            $svg = twentytwenty_get_theme_svg('link');
        }
        $item_output = str_replace('</span>', '</span>' . $svg, $item_output);
    }
    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'bs_nav_menu_social_icons', 10, 4);

// Einbindung und Ergänzungen für StructuredData
require get_template_directory() . '/inc/structureddata-content.php';

// Einbindung und Ergänzungen für index-slider
require get_template_directory() . '/inc/index_slider-content.php';

// FOOTER START 

function footer()
{
    $html = file_get_contents(get_template_directory() . '/views/footer.blade.html');

    $page_data = page_data();

    $html = str_replace(
        array(
            '{{language}}',
            '{{canonical}}',
            '{{title}}',
            '{{meta_description}}',
            '{{WPFORMS_SCRIPTS}}'
        ),
        array(
            'de',
            (strlen($page_data->canonical) > 0) ? $page_data->canonical : get_permalink(),
            (strlen($page_data->meta_title) > 0) ? $page_data->meta_title : get_the_title(),
            $page_data->meta_description,
            wpforms_footer_scripts()
        ),
        $html);
    #echo minify_html($html);

    echo $html;
}

function get_FooterMenu()
{

    $menuParameters = array(
        'menu' => '',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'container' => false,
        'echo' => false,
        'depth' => 0,
        'items_wrap' => '<div id="%1$s" class="footer_menu">%3$s</div>',

        'theme_location' => 'footer-menu',
    );

    $footer_menu = strip_tags(wp_nav_menu($menuParameters), '<a><div>');

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
    preg_match_all('@<h[1-6][\w|\W]*?</h[1-6]>@', $html, $_headings);
    $i = 0;
    foreach ($_headings[0] as $key => $value) {
        // is ID defined for headline?  
        preg_match_all('@<([^\s]+).*?id="([^"]*?)".*?>(.+?)</\1>@', $value, $_html);
        $str_2 = $value;

        if (!isset($_html[0]) or !isset($_html[0][0])) {
            preg_match_all('@<([^\s]+).*?>(.+?)</\1>@', $value, $_html);
            $tag = 'headline_' . $_html[1][0] . '_' . $i;
            $str_1 = $_html[0][0];
            $str_2 = str_replace(
                array(
                    '<' . $_html[1][0]
                ),
                array(
                    '<' . $_html[1][0] . ' id="' . $tag . '"'
                ),
                $str_1
            );
        }

        $html = str_replace($value, $str_2, $html);
        $i++;
    }

    return $html;
}

function get_skiplinks()
{
    $html = apply_filters('the_content', get_the_content());

    $skiplinks = '<nav class="skiplinks l-site-width js-skiplinks" id="skiplinks" role="navigation" data-has-module="yes"><h2 class="is-visuallyhidden">Skiplinks</h2><ul>';

    preg_match_all('@<h[1-6][\w|\W]*?</h[1-6]>@', $html, $_headings);
    $i = 0;
    foreach ($_headings[0] as $key => $value) {
        // is ID defined for headline?  
        preg_match_all('@<([^\s]+).*?id="([^"]*?)".*?>(.+?)</\1>@', $value, $_html);
        $str_2 = $value;

        if (!isset($_html[0]) or !isset($_html[0][0])) {
            preg_match_all('@<([^\s]+).*?>(.+?)</\1>@', $value, $_html);
            $tag = 'headline_' . $_html[1][0] . '_' . $i;
        }

        $html = str_replace($value, $str_2, $html);
        $skiplinks .= ' <li class="skiplink"><a accesskey="' . $i . '" href="#' . $tag . '" title="ALT + ' . $i . '">' . $_html[2][0] . '</a></li>';
        $i++;
    }
    $skiplinks .= '<li class="skiplink"><a accesskey="' . $i . '" href="#lb-search" title="[ALT + ' . $i . ']">Skip to search</a></li>';
    $skiplinks .= '</ul></nav>';
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
    $q = 'SELECT * FROM wp_seo WHERE wp_seo.page_id = "' . $post_ID . '"';
    if (false === $r = $db->query($q) or !$r->num_rows) {
        $q = 'INSERT INTO wp_seo (page_id) VALUES ("' . $post_ID . '")';
        $db->query($q);
    }
}


function cleanup_seo($post_ID) // GET'S CALLED WHEN TRASH IS BEING EMPTIED !!!
{
    $db = db();
    $q = 'DELETE FROM wp_seo WHERE wp_seo.page_id = "' . $post_ID . '"';
    $db->query($q);
}

// HOOKS / ADDITIONAL FUNCTIONS END


// HELPER FUNCTIONS

function postChangedEmail($post_ID)
{
    $empfaenger = 'seo-cron@bluesummit.de';
    $betreff = 'Wordpress Admin | Post Changed: ' . $post_ID;
    $nachricht = 'no message';
    $header = 'From: noreply@bluesummit.de' . "\r\n" .
        'Reply-To: noreply@bluesummit.de' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($empfaenger, $betreff, $nachricht, $header);
}


function db()
{
    $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $db;
}

function minify_html($input)
{
    if (trim($input) === "") return $input;
    // Remove extra white-space(s) between HTML attribute(s)
    $input = preg_replace_callback('#<([^\/\s<>!]+)(?:\s+([^<>]*?)\s*|\s*)(\/?)>#s', function ($matches) {
        return '<' . $matches[1] . preg_replace('#([^\s=]+)(\=([\'"]?)(.*?)\3)?(\s+|$)#s', ' $1$2', $matches[2]) . $matches[3] . '>';
    }, str_replace("\r", "", $input));
    // Minify inline CSS declaration(s)
    if (strpos($input, ' style=') !== false) {
        $input = preg_replace_callback('#<([^<]+?)\s+style=([\'"])(.*?)\2(?=[\/\s>])#s', function ($matches) {
            return '<' . $matches[1] . ' style=' . $matches[2] . minify_css($matches[3]) . $matches[2];
        }, $input);
    }
    if (strpos($input, '</style>') !== false) {
        $input = preg_replace_callback('#<style(.*?)>(.*?)</style>#is', function ($matches) {
            return '<style' . $matches[1] . '>' . minify_css($matches[2]) . '</style>';
        }, $input);
    }
    if (strpos($input, '</script>') !== false) {
        $input = preg_replace_callback('#<script(.*?)>(.*?)</script>#is', function ($matches) {
            return '<script' . $matches[1] . '>' . minify_js($matches[2]) . '</script>';
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

function minify_js($input)
{
    if (trim($input) === "") return $input;
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

function minify_css($input)
{
    if (trim($input) === "") return $input;
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


function bS_theme_support()
{

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Custom background color.
    add_theme_support(
        'custom-background',
        array(
            'default-color' => 'f5efe0',
        )
    );

    // Set content-width.
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 580;
    }

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // Set post thumbnail size.
    set_post_thumbnail_size(1200, 9999);

    // Add custom image size used in Cover Template.
    add_image_size('bs-fullscreen', 1980, 9999);

    // Custom logo.
    $logo_width = 120;
    $logo_height = 90;

    // If the retina setting is active, double the recommended width and height.
    if (get_theme_mod('retina_logo', false)) {
        $logo_width = floor($logo_width * 2);
        $logo_height = floor($logo_height * 2);
    }
    add_theme_support(
        'custom-logo',
        array(
            'height' => $logo_height,
            'width' => $logo_width,
            'flex-height' => true,
            'flex-width' => true,
        )
    );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

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
 * @param string $area The area we want to get the colors for.
 * @param string $context Can be 'text' or 'accent'.
 * @return string Returns a HEX color.
 * @since Twenty Twenty 1.0
 *
 */
function bs_get_color_for_area($area = 'content', $context = 'text')
{

    // Get the value from the theme-mod.
    $settings = get_theme_mod(
        'accent_accessible_colors',
        array(
            'content' => array(
                'text' => 'blue',
                'accent' => '#cd2653',
                'secondary' => '#6d6d6d',
                'borders' => '#dcd7ca',
            ),
            'header-footer' => array(
                'text' => 'green',
                'accent' => '#cd2653',
                'secondary' => '#6d6d6d',
                'borders' => '#dcd7ca',
            ),
        )
    );

    // If we have a value return it.
    if (isset($settings[$area]) && isset($settings[$area][$context])) {
        return $settings[$area][$context];
    }

    // Return false if the option doesn't exist.
    return false;
}

function kb_whitelist_blocks()
{
    return array(
        'core/columns',
        'core/column',
        'core/group',
        'core/spacer',
        'core/groups',
        'core/heading',
        'core/paragraph',
        'core/media-text',
        'core/image',
        'core/video',
        'core/list',
        'core/table',
        'core/quote',
        'core/latest-posts',
        'core/more',
        'core/buttons',
        'core_tabs',
        'core/html',
        'core/embed',
        'core/separator',
        'lb/slide-item-content',
        'lb/two-column-text',
        'lb/hero-img',
        'lb/text-img',
        'lb/img-text',
        'my-first-gutenberg-block/image-with-text-block',
        'my-lb-block/accordion-item',
        'lb/button',
        'lb/more-link',
        'lb/extranavi',
        'lb/media-text',
        'lb/presse-img-text',
        'lb/presse-text-img',
        'lb/section',
        'lb/teaser-slide-frame',
        'lb/teaser-slide-item',
        'lb/teaser-slide-thumbs-frame',
        'lb/teaser-slide-thumb-item',
        'lb/content-slide-frame',
        'lb/lotterie-slide-item',
        'lb/text-media',
        'lb/benefits-text',
        'lb/text-two-cta-img',
        'lb/img-text-two-cta',
        'lb/verlinkungen-frame',
        'lb/testimonial',
        'core/shortcode',
        'core/editor',
        'core/block-editor',
        'ub/tabbed-content-block',
        'ub/tabbed-content',
        'ub/tab-block',
        /*******BITV****/
        'bitv/testimonial',
        'bitv/two-column-text',
        'bitv/button',
    );
}

add_filter('allowed_block_types', 'kb_whitelist_blocks');


add_action('init', 'kb_page_excerpts');

function kb_page_excerpts()
{
    add_post_type_support('page', 'excerpt');
}

/**/
/**
 * Add featured image column to WP admin panel - posts AND pages
 * See: https://j0e.org/featured-image-admin/
 */

// Set thumbnail size
add_image_size('j0e_admin-featured-image', 60, 60, false);

// Add the posts and pages columns filter. Same function for both.
add_filter('manage_posts_columns', 'j0e_add_thumbnail_column', 2);
add_filter('manage_pages_columns', 'j0e_add_thumbnail_column', 2);
function j0e_add_thumbnail_column($j0e_columns)
{
    $j0e_columns['j0e_thumb'] = __('Image');
    return $j0e_columns;
}

// Add featured image thumbnail to the WP Admin table.
add_action('manage_posts_custom_column', 'j0e_show_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'j0e_show_thumbnail_column', 5, 2);
function j0e_show_thumbnail_column($j0e_columns, $j0e_id)
{
    switch ($j0e_columns) {
        case 'j0e_thumb':
            if (function_exists('the_post_thumbnail'))
                echo the_post_thumbnail('j0e_admin-featured-image');
            break;
    }
}

// Move the new column at the first place.
add_filter('manage_posts_columns', 'j0e_column_order');
function j0e_column_order($columns)
{
    $n_columns = array();
    $move = 'j0e_thumb'; // which column to move
    $before = 'title'; // move before this column

    foreach ($columns as $key => $value) {
        if ($key == $before) {
            $n_columns[$move] = $move;
        }
        $n_columns[$key] = $value;
    }
    return $n_columns;
}

// Format the column width with CSS
add_action('admin_head', 'j0e_add_admin_styles');
function j0e_add_admin_styles()
{
    echo '<style>.column-j0e_thumb {width: 60px;}</style>';
}

// Activate set featured image

add_theme_support('post-thumbnails');


add_filter('acf/format_value/type=textarea', 'do_shortcode');


/*

function lt_html_excerpt($text) { // Fakes an excerpt if needed
    global $post;
    if ( '' == $text ) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace('\]\]\>', ']]&gt;', $text);
        //just add all the tags you want to appear in the excerpt -- be sure there are no white spaces in the string of allowed tags 
        $text = strip_tags($text,'<h1><h2><h3><p><br><b><a><em><strong>');
        // you can also change the length of the excerpt here, if you want 
        $excerpt_length = 55; 
        $words = explode(' ', $text, $excerpt_length + 1);
        if (count($words)> $excerpt_length) {
            array_pop($words);
            array_push($words, '[...]');
            $text = implode(' ', $words);
        }
    }
    return $text;
}


// remove the default filter 
remove_filter('get_the_excerpt', 'wp_trim_excerpt');

// now, add your own filter
add_filter('get_the_excerpt', 'lt_html_excerpt');
 */


function the_current_page()
{
    return get_query_var('paged') == 0 ? 1 : get_query_var('paged');
}


function has_parent($post, $post_id)
{
    if ($post->ID == $post_id)
        return true;
    elseif ($post->post_parent == 0)
        return false;
    else
        return has_parent(get_post($post->post_parent), $post_id);
}


function has_children()
{
    global $post;

    $pages = get_pages('child_of=' . $post->ID);

    if (count($pages) > 0):
        return true;
    else:
        return false;
    endif;
}

function is_top_level()
{
    global $post, $wpdb;

    $current_page = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = " . $post->ID);

    return $current_page;
}


function my_theme_embed_list_blocks()
{
    wp_enqueue_script(
        'embed-list-blocks',
        get_template_directory_uri() . '/assets/js/embed-list-blocks.js',
        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post')
    );
}

add_action('enqueue_block_editor_assets', 'my_theme_embed_list_blocks');

function sortDesc($a, $b)
{
    if (isset($b["date"]) && isset($a["date"])) {
        return strtotime($b["date"]) - strtotime($a["date"]);
    }
}

function sortAsc($a, $b)
{
    if (isset($b["date"]) && isset($a["date"])) {
        return strtotime($a["date"]) - strtotime($b["date"]);
    }
}

function ungerade($var, $cat_id)
{
    // Gibt zurück, ob der Eingabewert ungerade ist
    return $var['category_parent'] == $cat_id;
}

function shortcode_posts_function($atts = [], $content = null, $tag = '')
{

    $post_count = $atts['count'];
    $catname = $atts['cat'];
    $category = get_category_by_slug($atts['cat']);
    $cat_id = $category->term_id;
    $content = '';
    //Parameter für Posts
    $args = array(
        'category' => $cat_id,
        'numberposts' => -1
    );

    //Posts holen
    $posts = get_posts($args);
    $pages = [];

    foreach ($posts as $key => $post) {

        $sub_cat = $catname;
        $id = $post->ID;
        $cat = get_the_category($id);
        foreach ($cat as $key => $value) {

            if ($cat_id == $value->category_parent) {
                $sub_cat = $value->name;
            }
        }
        $today = date('Y-m-d', time());
        $date = DateTime::createFromFormat('d.m.y', @get_field('datum', $post->ID))->format('Y-m-d');
        if (strlen($post->post_title) > 1 && ($date <= $today)) {
            $img = '/wp-content/uploads/2021/06/SpielbankenBayern_allgemeines-PM-Motiv.png';
            if ($sub_cat == 'Unternehmens-News')
                $img = '/wp-content/uploads/2021/06/Presse-Unternehmens-News_2000x1100.jpg';
            if ($sub_cat == 'Gewinner-News')
                $img = '/wp-content/uploads/2021/06/Presse-News_Gewinnernews_2000x1100.jpg';
            if (strlen(get_the_post_thumbnail_url($id)) > 0) {
                $img = get_the_post_thumbnail_url($id);
            }
            $pages[] = array(
                'ID' => $post->ID,
                'post_title' => $post->post_title,
                'date' => $date,
                'excerpt' => str_replace($post->post_title, '', $post->post_content),
                'link' => get_permalink($post->ID),
                'category' => $catname,
                'sub_category' => $sub_cat,
                'thumb' => $img,

            );
            $years[] = date('Y', strtotime($date));
        }
    }

    if ($pages) {
        usort($pages, "sortDesc");
        if (count($pages) > $post_count) {
            $pages = array_slice($pages, 0, (int)$post_count);
        }

        //Inhalte sammeln
        $content = '<div class="news-div"><h2>Aktuelle News</h2><div class="news spalten_3">';

        $year = date('Y');

        foreach ($pages as $key => $post) {

            /*   echo '<pre>';
               print_r($post);
               echo '</pre>';

               */
            if (isset($post['date']) && isset($post['excerpt']) && isset($post['link']) && isset($post['category'])) {
                if (preg_match('@' . $year . '@', $post['date'])) {
                    $content .= '<div class="news_container active">';
                    $content .= '<div class="bg-image" style="background-image:url(\'' . $post['thumb'] . '\');" aria-label="' . $post['post_title'] . '"/></div>';
                    #$content .= '<img class="bg-image" src="'.$post['thumb'].'" alt="'.$post['post_title'].'" />';
                    $content .= '<div class="news_frame">';
                    $content .= '<span class="category">' . $post['sub_category'] . '</span>' . date('d.m.y', strtotime($post['date']));
                    #$content .= '<h2 class="news_headline"><a href="'.$post['link'].'" class="list headline">'. substr(strip_tags($post['post_title']),0 ,100).'</a></h2>';
                    $content .= '<h2 class="news_headline">' . substr(strip_tags($post['post_title']), 0, 100) . '</h2>';
                    $content .= '<p>' . substr(strip_tags($post['excerpt']), 0, 150) . '</p>';
                    $content .= '</div>';
                    $content .= '<a href="' . $post['link'] . '" class="list">Mehr erfahren <span class="material-icons">east</span></a>';
                    $content .= '</div>';
                }
            }
        }
        /*

      substr(get_the_excerpt($post->ID),0 ,100)

          foreach ($posts as $post) {
              $content .= '<div class="news_container active">';

              $img='wp-content/uploads/2021/06/SpielbankenBayern_allgemeines-PM-Motiv.png';

              if (strlen(get_the_post_thumbnail_url()) > 0)
              {
                  $img = get_the_post_thumbnail_url();
              }
              $content .= '<div class="bg-image" style="background-image:url(\''.$img.'\');"/></div>';
              $content .= '<a href="'.get_permalink($post->ID).'"><div class="title">'.$post->post_title.'</div></a>';
              $content .= '<p>'.$post['excerpt'].'[...]</p>';
              $content .= '<a href="'.get_permalink($post->ID).'"><img src="'.get_the_post_thumbnail_url($post->ID, 'full').'" class="thumb"></a>';
              $content .= '</div>';
          }

          */
        $content .= '</div></div>';

    }
    //Inhalte übergeben
    return $content;
}

add_shortcode('posts', 'shortcode_posts_function');


/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme()
{
    add_theme_support('html5', array('search-form'));
}

//add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );

if (!function_exists('code_head_etracker') && defined('WP_LIVE_HOST')) {
    #add_action('wp_head', 'code_head_etracker');
    function code_head_etracker()
    {
        if ($_SERVER['HTTP_HOST'] == WP_LIVE_HOST) {
            return '
                <!-- Copyright (c) 2000-2021 etracker GmbH. All rights reserved. -->
                <!-- This material may not be reproduced, displayed, modified or distributed -->
                <!-- without the express prior written permission of the copyright holder. -->
                <!-- etracker tracklet 5.0 -->
                <script type="text/javascript">
                // var et_pagename = "";
                // var et_areas = "";
                // var et_tval = 0;
                // var et_tsale = 0;
                // var et_tonr = "";
                // var et_basket = "";
                </script>
                <script id="_etLoader" type="text/javascript" charset="UTF-8" data-block-cookies="true" data-respect-dnt="true" data-secure-code="iVbDSE" src="//code.etracker.com/code/e.js" async></script>
                <!-- etracker tracklet 5.0 end -->
            ';
        }
        return '';
    }
}


// Amazon SES instead PHP mail.
add_action('phpmailer_init', 'use_amazon_ses');
function use_amazon_ses($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->SMTPAuth = true;
    $phpmailer->Username = AMAZON_SES_USER;
    $phpmailer->Password = AMAZON_SES_PASSWORD;
    $phpmailer->Host = AMAZON_SES_HOST;
    $phpmailer->Port = AMAZON_SES_PORT;
    $phpmailer->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
}

add_action( 'wp_footer', 'wpforms_footer_scripts' );
function wpforms_footer_scripts()
{
    $host = $_SERVER['HTTP_HOST'];
    return <<<EOF
    <script src='/wp-includes/js/wp-embed.min.js?ver=5.7.2' id='wp-embed-js'></script>
    <script src='/wp-includes/js/jquery/jquery.min.js?ver=3.5.1' id='jquery-core-js'></script>
    <script src='/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>
    <script src='/wp-content/plugins/wpforms-lite/assets/js/text-limit.min.js?ver=1.6.8.1' id='wpforms-text-limit-js'></script>
    <script src='/wp-content/plugins/wpforms-lite/assets/js/jquery.validate.min.js?ver=1.19.0' id='wpforms-validation-js'></script>
    <script src='/wp-content/plugins/wpforms-lite/assets/js/mailcheck.min.js?ver=1.1.2' id='wpforms-mailcheck-js'></script>
    <script src='/wp-content/plugins/wpforms-lite/assets/js/wpforms.js?ver=1.6.8.1' id='wpforms-js'></script>
    <script src='https://www.google.com/recaptcha/api.js?onload=wpformsRecaptchaLoad&#038;render=explicit' id='wpforms-recaptcha-js'></script>
    <script id='wpforms-recaptcha-js-after'>
        if (!Element.prototype.matches) {
            Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;
        }
        if (!Element.prototype.closest) {
            Element.prototype.closest = function (s) {
                var el = this;
                do {
                    if (Element.prototype.matches.call(el, s)) { return el; }
                    el = el.parentElement || el.parentNode;
                } while (el !== null && el.nodeType === 1);
                return null;
            };
        }

        var wpformsDispatchEvent = function (el, ev, custom) {
            var e = document.createEvent(custom ? "CustomEvent" : "HTMLEvents");
            custom ? e.initCustomEvent(ev, true, true, false) : e.initEvent(ev, true, true);
            el.dispatchEvent(e);
        };

        var wpformsRecaptchaLoad = function () {
            Array.prototype.forEach.call(document.querySelectorAll(".g-recaptcha"), function (el) {
                try {

                    var recaptchaID = grecaptcha.render(el, {
                        callback: function () {                            
                            wpformsRecaptchaCallback(el);
                        }
                    }, true);
                    
                    /******************
                    * WCAG - Properties
                    * */
                    el.querySelector('#g-recaptcha-response').setAttribute("aria-hidden", "true");
                    el.querySelector('#g-recaptcha-response').setAttribute("aria-label", "do not use");
                    el.querySelector('#g-recaptcha-response').setAttribute("aria-readonly", "true");

                    el.closest("form").querySelector("button[type=submit]").recaptchaID = recaptchaID;
                    
                } catch (error) {}
            });
            
            wpformsDispatchEvent(document, "wpformsRecaptchaLoaded", true);
        };
        var wpformsRecaptchaCallback = function (el) {
            
            var wp_form = el.closest("form");            
            if (typeof wpforms.formSubmit === "function") {
                wpforms.formSubmit(wp_form);
            } else {
                wp_form.querySelector("button[type=submit]").recaptchaID = false;
                wp_form.submit();
            }
        };
        
    </script>
    <script>
        /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
    </script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wpforms_settings = {"val_required":"This field is required.","val_email":"Please enter a valid email address.","val_email_suggestion":"Did you mean {suggestion}?","val_email_suggestion_title":"Click to accept this suggestion.","val_email_restricted":"This email address is not allowed.","val_number":"Please enter a valid number.","val_number_positive":"Please enter a valid positive number.","val_confirm":"Field values do not match.","val_checklimit":"You have exceeded the number of allowed selections: {#}.","val_limit_characters":"{count} of {limit} max characters.","val_limit_words":"{count} of {limit} max words.","val_recaptcha_fail_msg":"Google reCAPTCHA verification failed, please try again later.","val_empty_blanks":"Please fill out all blanks.","uuid_cookie":"","locale":"de","wpforms_plugin_url":"https:\/\/lotterie-spielbank-bayern.test\/wp-content\/plugins\/wpforms-lite\/","gdpr":"","ajaxurl":"https:\/\/$host\/wp-admin\/admin-ajax.php","mailcheck_enabled":"1","mailcheck_domains":[],"mailcheck_toplevel_domains":["dev"],"is_ssl":"1"}
        /* ]]> */
    </script>
    
EOF;

}
