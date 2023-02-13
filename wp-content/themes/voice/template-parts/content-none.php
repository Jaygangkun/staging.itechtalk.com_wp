<article id="post-0" <?php post_class(); ?>>
	<?php if ( current_user_can( 'publish_posts' ) ) : ?>

	<p class="no-modules-msg"><?php echo wp_kses_post( sprintf( __( 'No posts can be found on this page. Go and <a href="%1$s">add some new posts</a>.', 'voice' ), admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

		<p class="no-modules-msg"><?php echo __vce( 'nothing_found_search'); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<p class="no-modules-msg"><?php echo __vce( 'nothing_found_text'); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>

</article>