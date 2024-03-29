<?php get_header(); ?>

<?php get_template_part('template-parts/cover-area'); ?>

<?php get_template_part( 'template-parts/ads/below-header' ); ?>

<?php if ( function_exists('yoast_breadcrumb') ) : ?>
	<?php yoast_breadcrumb('<div id="mks-breadcrumbs" class="container mks-bredcrumbs-container"><p id="breadcrumbs">','</p></div>'); ?>
<?php endif; ?>

<?php global $vce_sidebar_opts; ?>

<div id="content" class="container site-content vce-sid-<?php echo esc_attr( $vce_sidebar_opts['use_sidebar'] ); ?>">
	
	<?php if ( $vce_sidebar_opts['use_sidebar'] == 'left' ) { get_sidebar(); } ?>
		
	<div id="primary" class="vce-main-content">

		<main id="main" class="main-box main-box-single">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', ( !vce_use_cover_fimg() ? get_post_format() : '') ); ?>

		<?php endwhile; ?>

		<?php if(vce_get_post_display('show_prev_next')) : ?>
			<?php get_template_part('template-parts/prev-next'); ?>
		<?php endif; ?>

		</main>

		<?php if(vce_get_post_display('show_author_box') && vce_get_option('author_box_position') == 'up') : ?>
			<?php get_template_part('template-parts/author-box'); ?>
		<?php endif; ?>

		<?php if(vce_get_post_display('show_related')) : ?>
			<?php get_template_part('template-parts/related-box'); ?>
		<?php endif; ?>

		<?php if(vce_get_post_display('show_author_box') && vce_get_option('author_box_position') == 'down') : ?>
			<?php get_template_part('template-parts/author-box'); ?>
		<?php endif; ?>

		<?php comments_template(); ?>

	</div>

	<?php if ( $vce_sidebar_opts['use_sidebar'] == 'right' ) { get_sidebar(); } ?>

</div>

<?php get_template_part('template-parts/pagination/single-infinite-scroll'); ?>

<?php get_footer(); ?>