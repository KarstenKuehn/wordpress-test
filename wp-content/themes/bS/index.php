<?php
/* 
	Template_x Name: Index Template
*/
get_header(); ?>
<?php
	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
?>
<main id="site-content" role="main">

	<?php

	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
		global $wp_query;
		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);
		if ( $wp_query->found_posts ) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results. */
				_n(
					'We found %s result for your search.',
					'We found %s results for your search.',
					$wp_query->found_posts,
					'twentytwenty'
				),
				number_format_i18n( $wp_query->found_posts )
			);
		} else {
			$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty' );
		}
	} elseif ( is_archive() && ! have_posts() ) {
		$archive_title = __( 'Nothing Found', 'twentytwenty' );
	} elseif ( ! is_home() ) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}

	if ( $archive_title || $archive_subtitle ) {
		?>

		<header class="archive-header has-text-align-center header-footer-group">

			<div class="archive-header-inner section-inner medium">

				<?php if ( $archive_title ) { ?>
					<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
				<?php } ?>

				<?php if ( $archive_subtitle ) { ?>
					<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
				<?php } ?>

			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->
		<?php
	}

	if ( have_posts() ) {
		$i = 0;

		while ( have_posts() ) {
			$i++;
			if ( $i > 1 ) {
				echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
			}
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		}
	} elseif ( is_search() ) {
		?>

		<div class="no-search-results-form section-inner thin">

			<?php
			get_search_form(
				array(
					'label' => __( 'search again', 'twentytwenty' ),
				)
			);
			?>

		</div><!-- .no-search-results -->

		<?php
	}
	?>

	<?php get_template_part( 'template-parts/pagination' ); ?>

</main><!-- #site-content -->
<?php
	}
//	else
	{

//	echo seo_index_slider();
?>
<main id="maincontent">

        <?php
            if(get_the_post_thumbnail_url()!='')
            {
                //echo '<div class="bg-image" style="background-image:url(\''.get_the_post_thumbnail_url().'\');"><div class="hero-image-stairway"></div></div>';
            }
          ?>
<?php
		//the_content();

				//echo '<section class="wp-block-lb-section content_section bitv"><div class="modul"><h1 class="e_headline has-huge-font-size">'.get_the_title().'</h1></div></section>';
		$html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
		echo $html;
		//echo '<div class="main">';		echo '</div>';
?>
</main>
<?php		
	}
?>

<?php get_footer(); ?>
<?php seo_structuredData();?>