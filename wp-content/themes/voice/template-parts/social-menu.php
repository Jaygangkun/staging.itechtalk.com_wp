<?php if ( has_nav_menu( 'vce_social_menu' ) ) : ?>
	<?php
	wp_nav_menu( array(
			'theme_location' => 'vce_social_menu',
			'menu' => 'vce_social_menu',
			'menu_class' => 'soc-nav-menu',
			'menu_id' => 'vce_social_menu',
			'container' => 'div',
			'depth'           => 1,
			'link_before'     => '<span class="vce-social-name">',
			'link_after'      => '</span>',
		)
	);
?>
<?php else: ?>
	<?php if( current_user_can('manage_options') ): ?>
	<ul id="vce_social_menu" class="top-nav-menu">
		<li>
			<a href="<?php echo admin_url( 'nav-menus.php' ); ?>"><?php esc_html_e( 'Click here to add social menu', 'voice' ); ?></a>
		</li>
	</ul>
	<?php endif; ?>
<?php endif; ?>

