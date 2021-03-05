<?php
/*
Plugin Name: SEO Plugin | Blue Summit
Plugin URI: https://wwww.bluesummit.de
Description: Everything SEO
Version: 1.0
Author: Blue Summit
*/

/** Step 2 (from text above). */
add_action( 'admin_menu', 'bs_seo_menu' );

/** Step 1. */
function bs_seo_menu() {
	add_options_page( 'SEO Einstellungen', 'SEO', 'manage_options', 'bs_seo_plugin', 'handle' );
}

/** Step 3. */
function handle() {
	
	// SUBMIT
	if(isset($_POST['bs_seo_save_button']))
	{

		foreach (get_pages() as $key => $value)
		{
			$index 	= '0';
			$follow = '0';

			if(@$_POST['index_'.$value->ID] == 'on')
			{
				$index = 1;
			}			
			if(@$_POST['follow_'.$value->ID] == 'on')
			{
				$follow = 1;
			}

			$q = 'UPDATE wp_seo SET 
			indexable = \''.$index.'\',
			follow = \''.$follow.'\',
			meta_title = \''.$_POST['title_'.$value->ID].'\',
			meta_description = \''.$_POST['description_'.$value->ID].'\',
			canonical = \''.$_POST['canonical_'.$value->ID].'\' WHERE page_id = \''.$value->ID.'\'';

			db()->query($q);
		}
		$_POST = NULL;
	} // END SUBMIT;

	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	// OUTPUT

	echo '<style>
	input[type=text]{border-color:#FFF;}
	input[type=text]:hover{border-bottom: 1px solid #cccplaceholder="not set" ;}
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

	foreach (get_pages() as $key => $value)
	{
		$infos = getInfos($value->ID);
		echo '<tr style="">';
		echo '<td>'.$value->ID.'</td>';
		echo '<td>'.$value->post_title.'</td>';
		echo '<td>';
		echo '<input name="index_'.$value->ID.'" type="checkbox"';
		if ($infos->indexable == 1)
		{
			 echo ' checked';
		}
		echo '/>';
		
		echo '</td>';
		echo '<td>';
		echo '<input name="follow_'.$value->ID.'" type="checkbox"';
		if ($infos->follow == 1)
		{
			 echo ' checked';
		}
		echo '/>';

		echo '</td>';
		echo '<td><input placeholder="not set" name="canonical_'.$value->ID.'" value="'.$infos->canonical.'" type="text" /></td>';
		echo '<td><input placeholder="not set" name="title_'.$value->ID.'" value="'.$infos->meta_title.'" type="text" /></td>';
		echo '<td><input placeholder="not set" name="description_'.$value->ID.'" value="'.$infos->meta_description.'" type="text" /></td>';
		echo '</tr>';

	}
	
	echo '</tbody></table>';
	echo '<button type="submit" name="bs_seo_save_button" style="">speichern</button></form>';

	//END OUTPUT



}


function getInfos($id)
{
	$q = "SELECT * FROM wp_seo WHERE page_id = '".$id."'";
	if (false === $r = db()->query($q) OR !$r->num_rows)
    {
    	return array();
    }
    else
    {
    	return $r->fetch_object();
    }
}
