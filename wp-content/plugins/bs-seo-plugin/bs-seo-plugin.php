<?php
/*
Plugin Name: SEO Plugin | Blue Summit
Plugin URI: https://wwww.bluesummit.de
Description: Everything SEO
Version: 1.0
Author: Blue Summit
*/

/** Step 2 (from text above). */
add_action('admin_menu', 'bs_seo_menu');

/** Step 1. */
function bs_seo_menu()
{
    add_options_page('SEO Einstellungen', 'SEO', 'manage_options', 'bs_seo_plugin', 'handle');
}

/** Step 3. */
function handle()
{

    // SUBMIT
    if (isset($_POST['bs_seo_save_button'])) {

        if (function_exists('get_pages')) {

            foreach (get_pages() as $key => $value) {
                $index = 0;
                $follow = 0;

                if (parsePostValue('index_' . $value->ID, $_POST) == 'on') {
                    $index = 1;
                }
                if (parsePostValue('follow_' . $value->ID, $_POST) == 'on') {
                    $follow = 1;
                }

                updateInfos([
                    'indexable' => $index,
                    'follow' => $follow,
                    'meta_title' => parsePostValue('title_' . $value->ID, $_POST),
                    'meta_description' => parsePostValue('description_' . $value->ID, $_POST),
                    'canonical' => parsePostValue('canonical_' . $value->ID, $_POST)
                ], $value->ID);

            }

        }

        unset($_POST);

    } // END SUBMIT;

    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    // OUTPUT

    echo '<style>
	input[type=text]{border-color:#FFF;}
	input[type=text]:hover{border-bottom: 1px solid #ccc; placeholder="not set";}
	table{width:95%;background:#FFF;line-height:3em;text-align:left;padding-left:5px;padding-bottom:10px;}
	button{background: transparent;border: 1px solid #0071a1;color: #0071a1;margin-top:20px;padding: 5px;font-weight: 600;font-size: 13px;}
	td,th{border-bottom:1px solid #ccc;}
	</style>';

    echo '<h1>SEO</h1><div style="height:50px"></div>';

    echo '<form method="post">
	<table><thead>
	<th style="width:3%">ID:</th>
	<th style="width:15%">Page:</th>
	<th>Index / No Index:</th>
	<th>Follow / No Follow:</th>
	<th>Canonical:</th>
	<th>Meta Title:</th>
	<th>Meta Description:</th>
	</thead><tbody>';

    if (function_exists('get_pages')) {
        foreach (get_pages() as $key => $value) {

            $infos = getInfos($value->ID);
            echo '<tr style="">';
            echo '<td>' . $value->ID . '</td>';
            echo '<td>' . $value->post_title . '</td>';
            echo '<td>';
            echo '<input name="index_' . $value->ID . '" type="checkbox"';
            if ($infos->indexable == 1) {
                echo ' checked';
            }
            echo '/>';

            echo '</td>';
            echo '<td>';
            echo '<input name="follow_' . $value->ID . '" type="checkbox"';
            if ($infos->follow == 1) {
                echo ' checked';
            }
            echo '/>';

            echo '</td>';
            echo '<td><input placeholder="not set" name="canonical_' . $value->ID . '" value="' . $infos->canonical . '" type="text" /></td>';
            echo '<td><input placeholder="not set" name="title_' . $value->ID . '" value="' . $infos->meta_title . '" type="text" /></td>';
            echo '<td><input placeholder="not set" name="description_' . $value->ID . '" value="' . $infos->meta_description . '" type="text" /></td>';
            echo '</tr>';

        }
    }

    echo '</tbody></table>';
    echo '<button type="submit" name="bs_seo_save_button" style="">speichern</button></form>';

    //END OUTPUT
}

function getInfos($id)
{
    global $wpdb;

    return $wpdb->get_row("SELECT * FROM wp_seo WHERE page_id=$id");
}

function updateInfos($data, $page_id)
{
    global $wpdb;

    $wpdb->update(
        'wp_seo', // table
        $data,      // data
        ['page_id' => $page_id], // where
        // data_format
        [
            '%d',   // format "indexable" => numeric
            '%d',   // format "follow" => numeric
            '%s',   //format "meta_title" => string
            '%s',   // format "meta_description" => string
            '%s',   // format "canonical" => string
        ],
        // where_format
        ['%d']      // format page_id => numeric
    );
}

function parsePostValue($key, $POST_VAR)
{
    return (array_key_exists($key, $POST_VAR)) ? $POST_VAR[$key] : '';
}
