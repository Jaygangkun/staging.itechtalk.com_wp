<?php   $more_link = get_next_posts_link( ' ' ); ?>
<?php if(!empty($more_link)) : ?>
	<nav id="vce-pagination" class="vce-infinite-scroll">
		<?php echo wp_kses_post( $more_link ); ?>
	</nav>
<?php endif; ?>