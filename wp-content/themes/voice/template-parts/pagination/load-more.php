<?php   $more_link = get_next_posts_link( __vce('load_more') ); ?>
<?php if(!empty($more_link)) : ?>
	<nav id="vce-pagination" class="vce-load-more">
		<?php echo wp_kses_post( $more_link ); ?>
	</nav>
<?php endif; ?>