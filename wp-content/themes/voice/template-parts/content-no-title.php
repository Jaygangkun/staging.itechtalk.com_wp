<article id="post-<?php the_ID(); ?>" <?php post_class('vce-page'); ?>>

	<?php if ( vce_get_option( 'page_show_fimg' ) && has_post_thumbnail() ) : ?>
	 	<?php global $vce_sidebar_opts; $img_size = $vce_sidebar_opts['use_sidebar'] == 'none' ? 'vce-lay-a-nosid' : 'vce-lay-a'; ?>
	 	<div class="meta-image">
			<?php the_post_thumbnail( $img_size ); ?>
			<?php if(vce_get_option('page_show_fimg_cap') && $caption = get_post(get_post_thumbnail_id())->post_excerpt) : ?>
				<div class="vce-photo-caption"><?php echo wp_kses_post( $caption );  ?></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="entry-content page-content">
		<?php the_content(); ?>
	</div>

	<?php if ( vce_is_paginated_post() ) : ?>
			<?php get_template_part( 'template-parts/paginated-nav' ); ?>
	<?php endif; ?>

	<?php if ( vce_get_option( 'page_show_share' ) ) : ?>
	  	<?php get_template_part('template-parts/share-bar'); ?>
	<?php endif; ?>

</article>