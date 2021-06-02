##GENERAL:
The idea is not to change the WP Core but to implement all new functions and desings via Templates and Plugins so that the overall strucutre of WP is not compromized and updates can be done throughout the entire lifetime.


##WP Documentation for DEVs
https://codex.wordpress.org/Main_Page
https://codex.wordpress.org/de:Hauptseite

=> https://developer.wordpress.org/reference/


##LAZY LOADING
Script in Footer Blade implemented



##CSS & PAGESPEEd <RULES>

#NO FLOAT!
#NO LIBRARIES!

1) We're serving different CSS Files - functionality is already implemented.
2) In order to keep functionality the main.css is imported into the internal css.
3) Breakpoints:

min 		320px;
@media: 	768px;


##HEADER & FOOTER

The Header & Footer are loaded by the template - however in order not to damage WP functionality the standard functions "wp_head" and "wp_footer" are still in the template, and we should check if they are needed...


##PLUGINS
1) Redirection
2) Password Protected (in order to prevent site to be accessed before launch)
3) Google Sitemap
(4... our Plugins)
4) There is a german dictionary installed in order to make WP-Admin "deutsch"- 
everytime you install a (commercial) plugin you might / certainly will get a message to update - 
because the systems wants to update the plugin's language. 
5) ALL Plugins should be developed in "GERMAN" (deutsche Plugins!)

3) BS SEO PLUGIN
=> DO NOT FORGET TO UPLOAD DB from plugin folder (!)

##EIGENE VORLAGEN
1) im Folder ...\wp-content\themes\MyTHEMES Datei block-patterns.php erstellen
2) hier eigene Kategorie registrieren => register_block_pattern_category( ... );
3) in ...\wp-content\themes\MyTHEMES\functions.php 
	einbinden => require get_template_directory() . '/block-patterns.php';
4) eigenen Plugin für eigene Vorlagen definieren => \wp-content\plugins\MyPLUGIN\myPlugin.php
5) eigene block-patterns registrieren => register_block_pattern( ... ) 

##EIGENE BLÖCKE
1) im Folder ...\wp-content\Plugins\bs-custom-block bs-custom-block.php Datei editieren
2) für neuen Block neue Funktion definieren: 
	function load_custom-block-xy() {
  		wp_enqueue_script(
    		'custom-block-xy',
    		plugin_dir_url(__FILE__) . 'custom-block-xy.js',
    		array( 'wp-blocks','wp-editor', 'wp-element' ),
   			true
  		);
	}
	
	add_action('enqueue_block_editor_assets', 'load_custom-block-xy');

3) im gleichen Ordner 'custom-block-xy.js erstellen
	// Hinweis: HTML berücksichtigen
		el( **editor.RichText.Content**, {
          tagName:'p',
          className:'customClass',
          value:  attributes.[customAttributes]
          },
        ), 
4) functions.php 
	function kb_whitelist_blocks() {
  		return array(
			  // alle relevante Blöcke auflisten
			  // neuen Block einfügen
  		)
  	}
	add_filter('allowed_block_types','kb_whitelist_blocks');

## embed_list_blocks definieren
1) in functions.php
	function my_theme_embed_list_blocks() {
		wp_enqueue_script(
			'embed-list-blocks',
			get_template_directory_uri() . '/assets/js/embed-list-blocks.js',
			array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
		);
	}
	add_action( 'enqueue_block_editor_assets', 'my_theme_embed_list_blocks' );
2) /assets/js/embed-list-blocks.js mit folgendem Inhalt erstellen
	wp.domReady(function () {
		const allowedEmbedBlocks = [
			'youtube',
		];
		wp.blocks.getBlockVariations('core/embed').forEach(function (blockVariation) {
			if (-1 === allowedEmbedBlocks.indexOf(blockVariation.name)) {
			wp.blocks.unregisterBlockVariation('core/embed', blockVariation.name);
			}
		});
	});
	//hier alle EmbedBlocks außer 'youtube' deaktivieren

## ROLES 
No additional roles have to be implemented into Wordpress (atm 08.02.2021)


##LIVE SYSTEM | WP ADMIN
Password to access pages:
parser

## DEV | SERVER
There is an alias - just type "pull" from anywhere in the system


## BACKUP
There is a script that backups the db and the whole wp installation at 8:00.
