<?php if($pagination = vce_pagination(__vce('previous_posts'),__vce('next_posts'))) : ?>
<nav id="vce-pagination">
	<?php echo wp_kses_post( $pagination ); ?>
</nav>
<?php endif; ?>