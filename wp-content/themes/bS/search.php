<?php
/* 
	Template Name: Search Template
*/
get_header(); ?>
<?php
	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
?>
<main id="site-content" role="main" class="main search">
<div class="">
	<?php

	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
		global $wp_query;
		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">Suchergebnisse für </span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);
		if ( $wp_query->found_posts ) {
			$archive_subtitle = number_format_i18n( $wp_query->found_posts ).' Treffer';
		} else {
			$archive_subtitle ='Es konnten keine Ergebnisse für deine Suche gefunden werden.';
		}
	} elseif ( is_archive() && ! have_posts() ) {
		$archive_title = __( 'Nothing Found', 'bS' );
	} elseif ( ! is_home() ) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}

	if ( $archive_title || $archive_subtitle ) {
		?>

		<header class="archive-header header-footer-group">

			<div class="archive-header-inner section-inner">

				<?php if ( $archive_title ) { ?>
					<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
				<?php } ?>

				<?php if ( $archive_subtitle ) { ?>
					<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
				<?php } ?>

			</div><!-- .archive-header-inner -->
		</header><!-- .archive-header -->


<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true">

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



		<?php
	}
	?>

	<?php get_template_part( 'template-parts/pagination' ); ?>
</div>
</main><!-- #site-content -->
<?php
	}
	else
	{
		the_content();
	}
?>

<?php get_footer(); ?>
<?php seo_structuredData();?>