<?php if ( has_nav_menu( 'vce_top_navigation_menu' ) ) : ?>
	<?php wp_nav_menu( array( 'theme_location' => 'vce_top_navigation_menu', 'menu' => 'vce_top_navigation_menu', 'menu_class' => 'top-nav-menu', 'menu_id' => 'vce_top_navigation_menu', 'container' => false ) ); ?>
<?php else: ?>
	<?php if( current_user_can('manage_options') ): ?>
		<ul id="vce_top_navigation_menu" class="top-nav-menu">
			<li>
				<a href="<?php echo admin_url( 'nav-menus.php' ); ?>"><?php esc_html_e( 'Click here to add top navigation', 'voice' ); ?></a>
			</li>
		</ul>
	<?php endif; ?>
<?php endif; ?>
