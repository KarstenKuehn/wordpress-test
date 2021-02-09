##GENERAL:
The idea is not to change the WP Core but to implement all new functions and desings via Templates and Plugins so that the overall strucutre of WP is not compromized and updates can be done throughout the entire lifetime.


##WP Documentation for DEVs
https://codex.wordpress.org/Main_Page
https://codex.wordpress.org/de:Hauptseite

=> https://developer.wordpress.org/reference/


##LAZY LOADING

Script in Footer Blade

EXAMPLE:
&lt;img src="/wordpress-template/wp-content/themes/bS/assets/p.gif" class="lazy" data-src="REAL IMG PATH HERE" /&gt;



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
3) ALL Plugins should be developed in "GERMAN" (deutsche Plugins!)

3) BS SEO PLUGIN
=> DO NOT FORGET TO UPLOAD DB from plugin folder (!)


## ROLES 
No additional roles have to be implemented into Wordpress (atm 08.02.2021)


##LIVE SYSTEM | WP ADMIN
Password to access pages:
parser

## DEV | SERVER
There is an alias - just type "pull" from anywhere in the system


##PHP MY ADMIN
lottobay
9ot!pSxJ^5$OFt@qV/oF-4Wx!;Kz"74X