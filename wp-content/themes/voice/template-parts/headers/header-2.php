<div class="container header-2-wrapper header-main-area">	
	<?php get_template_part( 'template-parts/headers/logo'); ?>

	<div class="vce-header-ads">
		<?php echo do_shortcode(vce_get_option('header_ad')); ?>
	</div>
</div>

<div class="header-bottom-wrapper header-left-nav">
	<div class="container">
		<?php get_template_part( 'template-parts/headers/navigation'); ?>
	</div>
</div>