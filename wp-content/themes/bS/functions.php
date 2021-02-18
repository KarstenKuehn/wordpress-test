<?php

// HEADER START 

function seo_header()
{


	$html = file_get_contents( get_template_directory().'/views/header.blade.html');

	$page_data = page_data();

	$css = file_get_contents(get_template_directory().'/css/viewport.css');
	$css .= file_get_contents(get_template_directory().'/css/main_min.css');
	
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

// HEADER END 
function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Top Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
      'social' => __( 'Social Menu' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );


// Funktion Registrieren der Block Vorlage
function meine_block_vorlage() {

  register_block_pattern(
      'meine-vorlagen/beispiel-block-vorlage',
      array('categories'  => array('buttons'),      
            'title'     => 'Meine Beispiel Block Vorlage',
            'content'   => "<!-- wp:columns {\"gradient\":\"luminous-vivid-amber-to-luminous-vivid-orange\"} -->\n<div class=\"wp-block-columns has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background has-background\"><!-- wp:column {\"width\":\"50px\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50px\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"100%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:100%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
      )
  );
  
}


// Aufruf der Funktion im init Hook
add_action( 'init', 'meine_block_vorlage' );


require get_template_directory() . '/inc/template-tags.php';

// Handle SVG icons.
require get_template_directory() . '/classes/class-bs-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';

// Handle Customizer settings.
require get_template_directory() . '/classes/class-bs-customize.php';


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


// FOOTER END 



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
    echo $html;
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

    $empfaenger = 'seo-cron@bluesummit.de';
    $betreff = 'Post has changed: '.$post_ID;
    $nachricht = 'no message';
    $header = 'From: noreply <noreply@bluesummit.de>' . "\r\n" .
        'Reply-To: noreply <noreply@bluesummit.de>' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($empfaenger, $betreff, $nachricht, $header);
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