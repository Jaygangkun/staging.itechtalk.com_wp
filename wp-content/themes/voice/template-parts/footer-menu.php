<?php if ( has_nav_menu( 'vce_footer_menu' ) ) : ?>
	<?php wp_nav_menu( array( 'theme_location' => 'vce_footer_menu', 'menu' => 'vce_footer_menu', 'menu_class' => 'bottom-nav-menu', 'menu_id' => 'vce_footer_menu', 'container' => false, 'depth' => 1 ) ); ?>
<?php else: ?>
	<?php if( current_user_can('manage_options') ): ?>
	<ul id="vce_footer_menu" class="bottom-nav-menu">
		<li>
			<a href="<?php echo admin_url( 'nav-menus.php' ); ?>"><?php esc_html_e( 'Click here to add footer navigation', 'voice' ); ?></a>
		</li>
	</ul>
	<?php endif; ?>
<?php endif; ?>

