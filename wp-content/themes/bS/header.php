<?php seo_header();?>

<body>
<div class="wp-block-columns lotto-header">
	<div class="wp-block-column lotto-logo">
		<figure class="wp-block-image size-large is-resized is-style-rounded logo">
			<a href="/">
			<picture>
				<source media="(max-width: 1029px)" srcset="/wp-content/uploads/2021/02/lotto_small.png">
				<source srcset="/wp-content/uploads/2021/02/lotto_transparent.png">
				<img alt="test" class="wp-image-21">
			</picture>
			</a>
		</figure>
	</div>
			<?php
			wp_nav_menu( array( 
			    'theme_location' => 'top-menu', 
			    'container_class' => 'wp-block-column lotto_top-menu top-menu' ) ); 
			?>

</div>