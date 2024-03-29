<?php $related_posts = vce_get_related_posts(); ?>

<?php if( $related_posts->have_posts() ): ?>
	
	<div class="main-box vce-related-box">

	<p class="main-box-title"><?php echo __vce('related_title'); ?></p>
	
	<div class="main-box-inside">

		<?php while($related_posts->have_posts()): $related_posts->the_post(); ?>
			<?php get_template_part('template-parts/loops/layout', vce_get_option('related_layout')); ?>
		<?php endwhile; ?>

	</div>

	</div>

<?php endif; ?>

<?php wp_reset_postdata(); ?>