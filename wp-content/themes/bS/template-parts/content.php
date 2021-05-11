<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php

	get_template_part( 'template-parts/entry-header' );

	if ( ! is_search() ) {
		get_template_part( 'template-parts/featured-image' );
	}

	?>
	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">
			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				//the_excerpt();
				$content = get_the_excerpt();
				//echo $content;
				$suchmuster = '#('.get_search_query().')#i';
				$ersetzung = '<span class="marked">$1</span>';
				echo preg_replace($suchmuster, $ersetzung, $content);
			} else {
				the_content( __( 'Continue reading', 'uplb' ) );
			}
			?>

		</div><!-- .entry-content -->

	</div><!-- .post-inner -->
	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'uplb' ) . '"><span class="label">' . __( 'Pages:', 'uplb' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		//edit_post_link();

		// Single bottom post meta.
		bs_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->
	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
 $homeLink = get_bloginfo('url');
echo '<div class="bottom">';
echo '<a href="' . $homeLink . '" class="home">'.bs_get_theme_svg( 'home' ).'</a>';

if(get_post_type() == 'post')
{
	if(has_category())
	{
		the_category( ' ' );
		echo ' <span class="material-icons">arrow_right_alt</span> ';
	}
}
if(get_post_type() == 'page')
{
	$current = $post->ID;
	$parent = $post->post_parent;
if($parent)
{



    $grandparent_get = get_post($parent);

    $grandparent = $grandparent_get->post_parent;


	if($grandparent)
	{
		echo get_the_title( $grandparent );
		echo ' <span class="material-icons">arrow_right_alt</span> ';
	}

echo get_the_title( $parent );
echo ' <span class="material-icons">arrow_right_alt</span> ';

}
else
{
	
}

	//print_r($post);
    $parent = wp_get_single_post($post->post_parent);
    //var_dump($parent);
    $grandparent_get = get_post($parent);

    $grandparent = $grandparent_get->post_parent;
}
/*

 echo '<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . $homeLink . '"><span itemprop="name" class="screen-reader-text">'.$home.'</span> ' .bs_get_theme_svg( 'home' ).'</a> ' . $delimiter . ' <meta itemprop="position" content="1"></li>';

*/





the_title( '<a href="' . esc_url( get_permalink() ) . '">', '</a>' );
echo '</div>';


   ?>
</article><!-- .post -->
