<article <?php post_class( 'vce-post vce-lay-e' ); ?>>

	<?php if ( $fimage = vce_get_category_featured_image( 'vce-lay-d', $cat->term_id ) ): ?>
	 	<div class="meta-image">
			<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" title="<?php echo esc_html($cat->name); ?>">
				<?php echo wp_kses_post( $fimage ); ?>
			</a>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo esc_html($cat->name); ?></a></h2>
		<?php if($mod['display_count']): ?>
		    <div class="entry-meta-count">
	       		<span class="meta-item"><?php echo esc_html( $cat->count ); ?> <?php echo esc_html( $mod['count_label'] ); ?></span>
	       	</div>
		<?php endif; ?>
	</header>

</article>